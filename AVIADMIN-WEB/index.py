from flask import Flask,render_template#importamos flask
from data_base import database as mongodb

DB=mongodb.dbConecction()

app=Flask(__name__)

@app.route('/Registrar_puesto')
def Registrar_puesto():
    titulo="Nuevo puesto"
    return render_template('administrador/puesto/Registrar_puesto.html', titulo=titulo)

@app.route('/')#ruta
def inicio():
    titulo="Inicio administrador"
    return render_template('index.html',titulo=titulo)#render template agarra cualquier archivo que este en su carpeta

if __name__ == "__main__":
    app.run(host="0.0.0.0",debug=True)#configuracion del host

