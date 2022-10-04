
from flask  import Flask, render_template,request, session,url_for,redirect,session,flash
from werkzeug.security import generate_password_hash,check_password_hash
from data_base import database as mongodb
from forms.puesto.puesto import Puesto 

import random

BD = mongodb.dbConection()
app = Flask(__name__)
app.secret_key = b'\xaf\xf97>\x9a\xcd\xbc\xea\xc9Hr\xb4[\x10\xabA'
#SECCION DE PUESTO
@app.route('/REGISTRAR-PUESTO')
def registrarPuesto():
    titulo = "NUEVO PUESTO"
    return render_template('administrador/puesto/registrarPuesto.html', titulo=titulo)


@app.route('/NUEVO-PUESTO', methods=['POST'])
def nuevoPuesto():
    puestos = BD['puestos']
    nombre = request.form['nombre']
    correo = request.form['correo']
    edad = request.form['edad']
    tipo_puesto = request.form['tipo_puesto']
    password = request.form['password']
    identificador = str(random.randint(0, 2000)) + correo
    if nombre and correo and edad and tipo_puesto and password:
        puesto = Puesto(
            identificador,nombre,correo,edad,tipo_puesto,password
            )
        puestos.insert_one(puesto.datoPuestoJson())
        return redirect('/REGISTRAR-PUESTO')

@app.route('/BASE-DE-DATOS-PUESTOS')
def base_de_datos_puestos():
    puestos = BD['puestos']
    titulo = "BASE DE DATOS PUESTOS"
    puestosRecibidos = puestos.find()
    return render_template('administrador/puesto/base_de_datos.html', titulo=titulo, puesto=puestosRecibidos)


@app.route('/OPERACIONES-PUESTO')
def opercionesPuesto():
    puestos = BD['puestos']
    titulo = "OPERACIONES PUESTO"
    puestosRecibidos = puestos.find()
    llave = "eliminar"
    return render_template('administrador/puesto/operaciones.html', titulo=titulo, puesto=puestosRecibidos,eliminar=llave)

@app.route('/INFORMACION-PUESTO<key>')
def informacionInformacion(key):
    titulo = "INFORMACION CONDUCTOR"
    puestos = BD['puestos']
    titulo = "OPERACIONES PUESTO"
    print(type(key),key)
    puestoRecibido = puestos.find_one({"identificador": key})
    return render_template('administrador/puesto/informacion.html',puesto=puestoRecibido,titulo=titulo)


@app.route('/ELIMINAR-PUESTO<key>')
def eliminarPuesto(key):
    puestos = BD['puestos']
    puestos.delete_one({"identificador": key})
    return redirect('/OPERACIONES-PUESTO')

@app.route('/')
def inicio():
    titulo = "INICIO ADMINISTRADOR"
    return render_template('index.html', titulo=titulo)



@app.route('/INICIAR-SESION-APLICACION')
def inicioAplicacion():
    titulo = "INICIAR SESION EMPLEADO"
    return render_template('aplicacion/index.html', titulo=titulo)

@app.route('/AUTENTICACION-EMPLEADO', methods=['POST'])
def autenticacionEmpleado():
    correo = request.form['correo']
    print(correo)
    password = request.form['password']
    print(password)
    usuario = False
    if correo and password:
        puesto = BD['puestos']
        puestoRecibido = puesto.find_one({"correo":correo})
        print("dentro de auten")
        if puestoRecibido:
            print(puestoRecibido['password'])
            if(check_password_hash(puestoRecibido['password'], password)==True):
                session['usuario'] = puestoRecibido['correo']
                print("usuario exite")
                usuario = True
                return redirect('/BASE-DE-DATOS-PUESTOS')
            elif(check_password_hash(puestoRecibido['password'], password)==False):
                flash("Error en Contra")
        elif usuario == False:
            flash("No existe usuario")  
        return inicioAplicacion()   
    flash("No se insertaron datos en el formulario")
    return inicioAplicacion()

if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True)