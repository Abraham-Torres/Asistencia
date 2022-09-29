class Puesto:
    def __init__(self,identificador,nombre,correo,edad,tipo_puesto,password):
        self.identificador = identificador
        self.nombre = nombre
        self.correo = correo
        self.edad = edad
        self.tipo_puesto = tipo_puesto
        self.password = password

    def datoPuestoJson(self):
        return{
            'identificador': self.identificador,
            'nombre': self.nombre,
            'correo': self.correo,
            'edad': self.edad,
            'tipo_puesto': self.tipo_puesto,
            'password': self.password
        }
        