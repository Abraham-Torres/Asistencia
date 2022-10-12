from flask import Flask,render_template,request,url_for,redirect,session,flash#importamos flask
from data_base import database as mongodb
from werkzeug.security import generate_password_hash,check_password_hash
from forms.puesto.Puesto import Puesto
from forms.operativos.Operativo import Operativo
from forms.estados.Estados import EstadosCat
from forms.notificaciones.Notificaciones import Notificacion
import random
import time


DB=mongodb.dbConecction()

app=Flask(__name__)
app.secret_key = b'\xaf\xf97>\x9a\xcd\xbc\xea\xc9Hr\xb4[\x10\xabA'
#******SESIONES*********
@app.route('/INICIAR-SESION-ADMINISTRADOR')
def iniciar_sesion():
    titulo="INICIAR SESION"
    return render_template('administrador/autenticacion/inicio-sesion.html',titulo = titulo)

@app.route('/AUTENTICACION-ADMINISTRADOR',methods=['POST'])
def autenticacion_usuario():
    correo=request.form['correo']
    password=request.form['password']
    usuario=False
    if correo and password:
        print("datos ingresado")
        Administrador=DB['administrador']
        AdminRecibido=Administrador.find_one({'correo':correo})
        if AdminRecibido:
            print('usuario encontrado')
            if(check_password_hash(AdminRecibido['password'],password)==True):
                session['usuario-administrador']=AdminRecibido['correo']
                usuario=True
                session.pop("usuario-puesto",None)
                return redirect('/BD-PUESTOS')
            elif(check_password_hash(AdminRecibido['password'],password)==False):
                flash("Error en la contraseña")
        elif usuario == False:
            flash("Error/usuario no existe")
        return iniciar_sesion() 
    flash("No se insertaron datos en el formulario")
    return iniciar_sesion()               
#////////////FIN DE SESIONES//////////////////////////                

#******SECCION DE PUESTO********

#RENDERIZACION DE NUEVO PUESTO
@app.route('/REGISTRAR-PUESTO')
def Registrar_puesto():
    if 'usuario-administrador' in session:
        titulo="Nuevo puesto"
        OperativosDB=DB['operativos']
        Notificaciones=DB['notificaciones']
        notificacionesRecibidas=Notificaciones.find().limit(4)
        OperativosRecibidos=OperativosDB.find()
        return render_template('administrador/puesto/registrar.html', titulo=titulo,op=OperativosRecibidos, notificacion = notificacionesRecibidas)
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
#AGREGAR DATOS
@app.route('/NUEVO-PUESTO',methods=['POST'])
def NuevoPuesto():
    nombre=request.form['nombre']
    correo=request.form['correo']
    edad=request.form['edad']
    telefono=request.form['telefono']
    tipo_puesto=request.form['tipo_puesto']
    password=request.form['password']
    identificador=str(random.randint(0,2000))+correo
    idnotificacion=str(random.randint(0,2000))+correo
    cuenta = session['usuario-administrador']
    hora = time.strftime("%X")
    contenido = "REGISTRO DE NUEVO PUESTO"

    if nombre and correo and edad and telefono and tipo_puesto and password and idnotificacion and cuenta and hora and contenido:
            key = generate_password_hash(password,method='sha256')
            puestos=DB['puestos']
            notificaciones=DB['notificaciones']
            puesto=Puesto(identificador,nombre,correo,edad,telefono,tipo_puesto,key) 
            puestos.insert_one(puesto.datoPuestoJson())
            notificacion=Notificacion(idnotificacion,cuenta,hora,contenido)
            notificaciones.insert_one(notificacion.datosNotificacionesJson())
            return redirect('/REGISTRAR-PUESTO')    

#MOSTRAR DATOS DE PUESTOS

@app.route('/BD-PUESTOS')
def base_datos_puesto():  
    if 'usuario-administrador' in session:
        puestos=DB['puestos']
        titulo="BD puestos"
        Notificaciones=DB['notificaciones']
        notificacionesRecibidas=Notificaciones.find().limit(4)
        puestosRecibidos=puestos.find()#para buscar en general
        return render_template('administrador/puesto/base-datos.html',titulo=titulo,puesto=puestosRecibidos,notificacion=notificacionesRecibidas)
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
#OPERACIONES DE PUESTOS
@app.route('/OPERACIONES-PUESTO')
def operaciones_puesto():  
    if 'usuario-administrador' in session:
        puestos=DB['puestos']
        titulo="Operaciones puesto"
        puestosRecibidos=puestos.find()
        Notificaciones=DB['notificaciones']
        notificacionesRecibidas=Notificaciones.find().limit(4)
        return render_template('administrador/puesto/operaciones-puesto.html',titulo=titulo,puestos=puestosRecibidos,notificacion=notificacionesRecibidas)
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
#INFORMACION DE PUESTO
@app.route('/INFORMACION-PUESTO<key>')#por la ruta va agarrar la key (la key es un argumento)
def informacion_puesto(key):
    if 'usuario-administrador' in session:
        titulo="Informacion puesto"
        puestos=DB['puestos']
        puestoRecibido=puestos.find_one({'identificador':key})
        Notificaciones=DB['notificaciones']
        notificacionesRecibidas=Notificaciones.find().limit(4)
        print(type(key),key)
        return render_template('administrador/puesto/informacion.html',titulo=titulo, puestos=puestoRecibido,notificacion=notificacionesRecibidas)
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
#INFORMACION/ELININAR
@app.route('/ELIMINAR-PUESTO<key>')
def eliminar_puesto(key):
    if 'usuario-administrador' in session:
        puestos=DB['puestos']
        puestos.delete_one({'identificador':key})
        return redirect('/OPERACIONES-PUESTO')    
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')

#INFORMACION/ACTUALIZAR 
@app.route('/ACTUALIZAR-PUESTO/<key>,<campo>',methods=['POST'])
def actualizar_puesto(key,campo):
    if 'usuario-administrador' in session: 
        puestos=DB['puestos']
        dato=request.form['dato']
        if dato:
            puestos.update_one({'identificador':key},{'$set':{campo:dato}}) 
        return informacion_puesto(key) 
    elif 'usuario-puesto' in session:
        return redirect('/INICIAR-SESION-ADMINISTRADOR')        
#////////FIN DE LA SECCION DE PUESTO/////////#

#*****SECCION DE PUESTOS OPERATIVOS*****

#AGREGAR DATOS    
 
@app.route('/NUEVO-PUESTO-OPERATIVO',methods=['POST'])
def nuevooperativo():
    if 'usuario-administrador' in session:
        OperativosDB=DB['operativos']
        PuestoOperativo=request.form['PuestoOperativo']
        identificador=str(random.randint(0,2000))+PuestoOperativo

        if identificador and PuestoOperativo:
            tipo=Operativo(identificador,PuestoOperativo)
            OperativosDB.insert_one(tipo.datosOperativoJson())
            return redirect('/OPERACIONES-PUESTO-OPERATIVO')
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
#MOSTRAR DATOS (ALL IN ONE)       
@app.route('/OPERACIONES-PUESTO-OPERATIVO')
def bdOperativo():
    if 'usuario-administrador' in session:
        OperativosDB=DB['operativos']
        OperativosRecibidos=OperativosDB.find()
        Notificaciones=DB['notificaciones']
        notificacionesRecibidas=Notificaciones.find().limit(4)
        return render_template('administrador/Operativo/base-datos.html',op=OperativosRecibidos,notificacion=notificacionesRecibidas)
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
#ELIMINAR DATOS
@app.route('/ELIMINAR-PUESTO-OPERATIVO<key>')
def OperativoElim(key):
    if 'usuario-administrador' in session:
        OperativosDB=DB['operativos']
        OperativosDB.delete_one({'identificador':key})
        return redirect('/OPERACIONES-PUESTO-OPERATIVO')  
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
#//////////FIN DE LA SECCION DE PUESTOS OPERATIVOS//////////////
#********SECCION DE ESTADOS OPERATIVOS*************

#MOSTRAR DATOS (ALL IN ONE)
@app.route('/OPERACIONES-ESTADO-OPERATIVO')
def estados():
    if 'usuario-administrador' in session:
        EstadosDB=DB['estadoscat']
        EstadosRecibidos=EstadosDB.find()
        print(EstadosRecibidos)
        Notificaciones=DB['notificaciones']
        notificacionesRecibidas=Notificaciones.find().limit(5)
        return render_template('administrador/Estado/base-datos.html',op=EstadosRecibidos,notificacion=notificacionesRecibidas)
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
#AGREGAR     
@app.route('/NUEVO-ESTADO-OPERATIVO',methods=['POST'])
def NuevoEstado():
    if 'usuario-administrador' in session:
        EstadosDB=DB['estadoscat']
        CategoriaEstado=request.form['EstadoOperativo']
        identificador=str(random.randint(0,2000))

        if identificador  and CategoriaEstado:
            categoria=EstadosCat(identificador,CategoriaEstado)
            EstadosDB.insert_one(categoria.datosEstadoOperativoJson())
            return redirect('/OPERACIONES-ESTADO-OPERATIVO')
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
 #ELIMINAR
@app.route('/ELIMINAR-ESTADO-OPERATIVO<key>')
def CategoriaEliminar(key):
    if 'usuario-administrador' in session:
        EstadosDB=DB['estadoscat']
        EstadosDB.delete_one({'identificador':key})
        return redirect('/OPERACIONES-ESTADO-OPERATIVO')
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
#////////////////FIN DE LA SECCION DE ESTADOS OPERATIVOS/////////////////

#****************SECCION DE ASISTENCIA************************
#Mostar datos (all in one?)(standby)
@app.route('/db-asistencia')
def bdAsistencia():
    if 'usuario-administrador' in session:
        AsistenciaDB=DB['puestos']
        AsistenciaRecibida=AsistenciaDB.find()
        return render_template('administrador/Asistencia/base-datos.html',op=AsistenciaRecibida)
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')
@app.route('/INICIO-ADMINISTRADOR')#ruta
def inicioAdministrador():
    if 'usuario-administrador' in session:
        titulo="Inicio administrador"
        return render_template('administrador/index.html',titulo=titulo)#render template agarra cualquier archivo que este en su carpeta
    elif 'usuario-puesto' in session:
        return redirect('INICIAR-SESION-ADMINISTRADOR')#render template agarra cualquier archivo que este en su carpeta
    
#SECCION DE APLICACION

@app.route('/INICIAR-SESION-PUESTO')
def inicar_sesion_puesto():
    titulo="INICAR SESION PUESTO"
    return render_template('aplicacion/autenticacion/iniciar-sesion.html',titulo=titulo)#render template

@app.route('/AUTENTICACION-PUESTO',methods=['POST'])
def autenticacion_puesto():
    correo=request.form['correo']
    password=request.form['password']
    usuario=False
    if correo and password:
        print("datos ingresado")
        Administrador=DB['puestos']
        AdminRecibido=Administrador.find_one({'correo':correo})
        if AdminRecibido:
            print('usuario encontrado')
            if(check_password_hash(AdminRecibido['password'],password)==True):
                session['usuario-puesto']=AdminRecibido['correo']
                usuario=True
                session.pop("usuario-administrador",None)
                return redirect('/INICIO-APLICACION')
            elif(check_password_hash(AdminRecibido['password'],password)==False):
                flash("Error en la contraseña")
        elif usuario == False:
            flash("Error/usuario no existe")
        return inicar_sesion_puesto()
    flash("No se insertaron datos en el formulario")
    return inicar_sesion_puesto()    

@app.route('/INICIO-APLICACION')
def inicioPuesto():
    if 'usuario-administrador' in session:
        return redirect('INICIAR-SESION-PUESTO')
    elif 'usuario-puesto' in session:
        datosPuestoaDB=DB['puestos']
        DatosEstadoDB=DB['estadoscat'] 
        DatosEstado=DatosEstadoDB.find() 
        DataPuesto=datosPuestoaDB.find_one({"correo":session['usuario-puesto']})
        #render template agarra cualquier archivo que este en su carpeta
        return render_template('aplicacion/index.html',op=DataPuesto,cat=DatosEstado)

#CONFIGURACION DE ASISTENCIA FLASK 
@app.route('/AsistenciaEmpleado')
def AsistenciaEmpleado():
    if 'usuario-administrador' in session:
        return redirect('INICIAR-SESION-PUESTO')
    elif 'usuario-puesto' in session:
        datosPuestoaDB=DB['puestos']
        DatosEstadoDB=DB['estadoscat']  
        DataPuesto=datosPuestoaDB.find_one({"correo":session['usuario-puesto']})
        nombre=DataPuesto['nombre']
        puesto=DataPuesto['puesto']
        fin="00-00-00"
        hora=time.strftime("%X")
        fecha=time.strftime("%d-%m-%y")
        print(fecha)
        print(hora)


        return redirect('/INICIO-APLICACION')



#CONFIGURACION DE BACKEND SEGURIDAD
@app.before_request
def verificar_session():
    ruta = request.path
    if 'usuario-puesto' in session:
        pass
    elif not 'usuario-administrador' in session and ruta !="/INICIAR-SESION-ADMINISTRADOR" and ruta !='/AUTENTICACION-ADMINISTRADOR' and ruta != "/AUTENTICACION-PUESTO" and ruta !='/INICIAR-SESION-PUESTO' and not ruta.startswith("/static"):
        flash("inicia sesion para continuar")
        return redirect('/INICIAR-SESION-ADMINISTRADOR')
    if 'usuario-administrador' in session:
        pass
    elif not 'usuario-puesto' in session and ruta !="/INICIAR-SESION-ADMINISTRADOR" and ruta !='/AUTENTICACION-ADMINISTRADOR' and ruta != "/AUTENTICACION-PUESTO" and ruta !='/INICIAR-SESION-PUESTO' and not ruta.startswith("/static"):
        flash("inicia sesion para continuar")
        return redirect('/INICIAR-SESION-PUESTO')

@app.route('/CERRAR-SESION-ADMINISTRADOR')
def cerrar_sesion_administrador():
    session.pop("usuario-administrador",None)
    return redirect('/INICIAR-SESION-ADMINISTRADOR')
@app.route('/CERRAR-SESION-PUESTO')
def cerrar_sesion_puesto():
    session.pop("usuario-puesto",None)
    return redirect('/INICIAR-SESION-PUESTO')

def pagina_no_encontrada(error):
    titulo = "404 PAGINA NO ENCONTRADA"
    return render_template('servidor/404.html',titulo=titulo)

if __name__ == "__main__":
    app.register_error_handler(404, pagina_no_encontrada)
    app.run(host="0.0.0.0",debug=True)#configuracion del host

