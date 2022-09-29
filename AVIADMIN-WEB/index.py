
from flask  import Flask, render_template,request,url_for,redirect
from data_base import database as mongodb
from forms.puesto.puesto import Puesto 
import random
BD = mongodb.dbConection()
app = Flask(__name__)

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

if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True)