class Asistencia:
    def __init__(self, identificador,Nombre, Correo,Estado,Inicio,Fin):
        self.identificador=identificador
        self.Nombre=Nombre
        self.Correo=Correo
        self.Estado=Estado
        self.Inicio=Inicio
        self.Fin=Fin
    def datosAsistenciaJson(self):
        return{
            'identificador':self.identificador,
            'Nombre':self.Nombre,
            'Correo':self.Correo,
            'Estado':self.Estado,
            'Inicio':self.Inicio,
            'Fin':self.Fin
        }   