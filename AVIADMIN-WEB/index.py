from flask import Flask,render_template,request,url_for,redirect#importamos flask
from data_base import database as mongodb
from forms.puesto.Puesto import Puesto
import random


DB=mongodb.dbConecction()

app=Flask(__name__)


#seccion de puesto
@app.route('/Registrar_puesto')
def Registrar_puesto():
    titulo="Nuevo puesto"
    return render_template('administrador/puesto/Registrar_puesto.html', titulo=titulo)

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

#mostrar datos de puesto
@app.route('/db-puesto')
def base_datos_puesto():  
    puestos=DB['puestos']
    titulo="BD puestos"
    puestosRecibidos=puestos.find()#para buscar en general
    return render_template('administrador/puesto/base-datos.html',titulo=titulo,puesto=puestosRecibidos)

@app.route('/')#ruta
def inicio():
    titulo="Inicio administrador"
    return render_template('index.html',titulo=titulo)#render template agarra cualquier archivo que este en su carpeta

if __name__ == "__main__":
    app.run(host="0.0.0.0",debug=True)#configuracion del host

