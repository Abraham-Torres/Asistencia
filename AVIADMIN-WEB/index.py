
from flask import Flask,render_template,request,url_for,redirect,session,flash#importamos flask
from data_base import database as mongodb
from werkzeug.security import generate_password_hash,check_password_hash
from forms.puesto.Puesto import Puesto
from forms.operativos.Operativo import Operativo
from forms.estados.Estados import EstadosCat
import random


DB=mongodb.dbConecction()

app=Flask(__name__)

#******SESIONES*********
@app.route('/INICIAR-SESION-ADMINISTRADOR')
def iniciar_sesion():
    titulo="INICIAR SESION"
    return render_template('',titulo)

@app.route('/AUTENTICACION-ADMINISTRADOR')
def autenticacion_usuario():
    correo=request.form['correo']
    password=request.form['password']
    usuario=False
    if correo and password:
        AdministradorDB=['admin']
        AdminRecibido=AdministradorDB.find_one({'correo':correo})
        if AdminRecibido:
            if(check_password_hash(AdminRecibido['password'],password)==True):
                session['usuario']=AdminRecibido['correo']
                usuario=True
                return redirect('/operaciones-puesto')
            elif(check_password_hash(AdminRecibido['password'],password)==False):
                flash("Error en la contraseña")
            elif usuario==False:
                flash("Error/usuario no existe")
        return iniciar_sesion() 
    flash("No se insertaron datos en el formulario")
    return iniciar_sesion()               
#////////////FIN DE SESIONES//////////////////////////                



#******SECCION DE PUESTO********

#RENDERIZACION DE NUEVO PUESTO
@app.route('/REGISTRAR-PUESTO')
def Registrar_puesto():
    titulo="Nuevo puesto"
    OperativosDB=DB['operativos']
    OperativosRecibidos=OperativosDB.find()
    return render_template('administrador/puesto/registrar.html', titulo=titulo,op=OperativosRecibidos)

#AGREGAR DATOS
@app.route('/NUEVO-PUESTO',methods=['POST'])
def NuevoPuesto():
   puestos=DB['puestos']#conexion
   nombre=request.form['nombre']
   correo=request.form['correo']
   edad=request.form['edad']
   tipo_puesto=request.form['tipo_puesto']
   password=request.form['password']
   identificador=str(random.randint(0,2000))+correo

   if nombre and correo and edad and tipo_puesto and password:
        puesto=Puesto(identificador,nombre,correo,edad,tipo_puesto,password) 
        puestos.insert_one(puesto.datoPuestoJson())
        return redirect('/REGISTRAR-PUESTO')    

#MOSTRAR DATOS DE PUESTOS

@app.route('/BD-PUESTOS')
def base_datos_puesto():  
    puestos=DB['puestos']
    titulo="BD puestos"
    puestosRecibidos=puestos.find()#para buscar en general
    return render_template('administrador/puesto/base-datos.html',titulo=titulo,puesto=puestosRecibidos)

#OPERACIONES DE PUESTOS
@app.route('/OPERACIONES-PUESTO')
def operaciones_puesto():  
    puestos=DB['puestos']
    titulo="Operaciones puesto"
    puestosRecibidos=puestos.find()
    return render_template('administrador/puesto/operaciones-puesto.html',titulo=titulo,puestos=puestosRecibidos)
    
#INFORMACION DE PUESTO
@app.route('/INFORMACION-PUESTO<key>')#por la ruta va agarrar la key (la key es un argumento)
def informacion_puesto(key):
    titulo="Informacion puesto"
    puestos=DB['puestos']
    puestoRecibido=puestos.find_one({'identificador':key})
    print(type(key),key)
    return render_template('administrador/puesto/informacion.html',titulo=titulo, puestos=puestoRecibido)

#INFORMACION/ELININAR
@app.route('/ELIMINAR-PUESTO<key>')
def eliminar_puesto(key):
    puestos=DB['puestos']
    puestos.delete_one({'identificador':key})
    return redirect('/OPERACIONES-PUESTO')    

#////////FIN DE LA SECCION DE PUESTO/////////#

#*****SECCION DE PUESTOS OPERATIVOS*****

#AGREGAR DATOS    
 
@app.route('/NUEVO-PUESTO-OPERATIVO',methods=['POST'])
def nuevooperativo():
    OperativosDB=DB['operativos']
    PuestoOperativo=request.form['PuestoOperativo']
    identificador=str(random.randint(0,2000))+PuestoOperativo

    if identificador and PuestoOperativo:
        tipo=Operativo(identificador,PuestoOperativo)
        OperativosDB.insert_one(tipo.datosOperativoJson())
        return redirect('/OPERACIONES-PUESTO-OPERATIVO')

#MOSTRAR DATOS (ALL IN ONE)       
@app.route('/OPERACIONES-PUESTO-OPERATIVO')
def bdOperativo():
    OperativosDB=DB['operativos']
    OperativosRecibidos=OperativosDB.find()
    return render_template('administrador/Operativo/base-datos.html',op=OperativosRecibidos)

#ELIMINAR DATOS
@app.route('/ELIMINAR-PUESTO-OPERATIVO<key>')
def OperativoElim(key):
    OperativosDB=DB['operativos']
    OperativosDB.delete_one({'identificador':key})
    return redirect('/OPERACIONES-PUESTO-OPERATIVO')  

#//////////FIN DE LA SECCION DE PUESTOS OPERATIVOS//////////////
#********SECCION DE ESTADOS OPERATIVOS*************

#MOSTRAR DATOS (ALL IN ONE)
@app.route('/OPERACIONES-ESTADO-OPERATIVO')
def estados():
    EstadosDB=DB['estadoscat']
    EstadosRecibidos=EstadosDB.find()
    print(EstadosRecibidos)
    return render_template('administrador/Estado/base-datos.html',op=EstadosRecibidos)

#AGREGAR     
@app.route('/NUEVO-ESTADO-OPERATIVO',methods=['POST'])
def NuevoEstado():
    EstadosDB=DB['estadoscat']
    CategoriaEstado=request.form['EstadoOperativo']
    identificador=str(random.randint(0,2000))

    if identificador  and CategoriaEstado:
        categoria=EstadosCat(identificador,CategoriaEstado)
        EstadosDB.insert_one(categoria.datosEstadoOperativoJson())
        return redirect('/OPERACIONES-ESTADO-OPERATIVO')

 #ELIMINAR
@app.route('/ELIMINAR-ESTADO-OPERATIVO<key>')
def CategoriaEliminar(key):
    EstadosDB=DB['estadoscat']
    EstadosDB.delete_one({'identificador':key})
    return redirect('/OPERACIONES-ESTADO-OPERATIVO')
#////////////////FIN DE LA SECCION DE ESTADOS OPERATIVOS/////////////////

#****************SECCION DE ASISTENCIA************************
#Mostar datos (all in one?)(standby)
@app.route('/db-asistencia')
def bdAsistencia():
    AsistenciaDB=DB['puestos']
    AsistenciaRecibida=AsistenciaDB.find()
    return render_template('administrador/Asistencia/base-datos.html',op=AsistenciaRecibida)


#APLICACION WEB


    
@app.route('/INICIO-ADMINISTRADOR')#ruta
def inicio():
    titulo="Inicio administrador"
    return render_template('administrador/index.html',titulo=titulo)#render template agarra cualquier archivo que este en su carpeta

if __name__ == "__main__":
    app.run(host="0.0.0.0",debug=True)#configuracion del host

