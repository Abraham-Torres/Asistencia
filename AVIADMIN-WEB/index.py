
from flask import Flask,render_template,request,url_for,redirect#importamos flask
from data_base import database as mongodb
from forms.puesto.Puesto import Puesto

import random


DB=mongodb.dbConecction()

app=Flask(__name__)

#******SECCION DE PUESTO********

#RENDERIZACION DE NUEVO PUESTO
@app.route('/Registrar_puesto')
def Registrar_puesto():
    titulo="Nuevo puesto"
    return render_template('administrador/puesto/Registrar_puesto.html', titulo=titulo)

#AGREGAR DATOS
@app.route('/Nuevo-puesto',methods=['POST'])
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
        return redirect('/Registrar_puesto')    

#MOSTRAR DATOS DE PUESTOS

@app.route('/db-puesto')
def base_datos_puesto():  
    puestos=DB['puestos']
    titulo="BD puestos"
    puestosRecibidos=puestos.find()#para buscar en general
    return render_template('administrador/puesto/base-datos.html',titulo=titulo,puesto=puestosRecibidos)

#OPERACIONES DE PUESTOS
@app.route('/operaciones-puesto')
def operaciones_puesto():  
    puestos=DB['puestos']
    titulo="Operaciones puesto"
    puestosRecibidos=puestos.find()
    return render_template('administrador/puesto/operaciones-puesto.html',titulo=titulo,puestos=puestosRecibidos)
    
#INFORMACION DE PUESTO
@app.route('/informacion-puesto<key>')#por la ruta va agarrar la key (la key es un argumento)
def informacion_puesto(key):
    titulo="Informacion puesto"
    puestos=DB['puestos']
    puestoRecibido=puestos.find_one({'identificador':key})
    print(type(key),key)
    return render_template('administrador/puesto/informacion.html',titulo=titulo, puestos=puestoRecibido)

#INFORMACION/ELININAR
@app.route('/eliminar<key>')
def informacion_puesto_eliminar(key):
    print(type(key),key)
    puestos=DB['puestos']
    puestos.delete_one({'identificador':key})
    return redirect('/operaciones-puesto')    

#****FIN DE LA SECCION DE PUESTO*******

#*****SECCION DE PUESTOS OPERATIVOS*****

#RENDERIZACION DE PUESTO OPERATIVO

@app.route('/Operativo')
def PuestoOperativo():
    titulo="DB puesto operativo"
    return render_template('administrador/Operativo/base-datos.html',titulo=titulo)


@app.route('/')#ruta
def inicio():
    titulo="Inicio administrador"
    return render_template('index.html',titulo=titulo)#render template agarra cualquier archivo que este en su carpeta

if __name__ == "__main__":
    app.run(host="0.0.0.0",debug=True)#configuracion del host

