from distutils.log import debug
from flask import Flask,render_template#importamos flask

app=Flask(__name__)

@app.route('/')#ruta
def inicio():
    return render_template('inicio.html')#render template agarra cualquier archivo que este en su carpeta

if __name__ == "__main__":
    app.run(host="0.0.0.0",debug=True)#configuracion del host

