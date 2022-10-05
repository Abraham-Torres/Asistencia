class Asistencia:
    def __init__(self, identificador,Fecha,Nombre,Puesto,Estado,Inicio,Fin):
        self.identificador=identificador
        self.Fecha=Fecha
        self.Nombre=Nombre
        self.Puesto = Puesto
        self.Estado=Estado
        self.Inicio=Inicio
        self.Fin=Fin
    def datosAsistenciaJson(self):
        return{
            'identificador':self.identificador,
            'Fecha':self.Fecha,
            'Nombre':self.Nombre,
            'Puesto':self.Puesto,
            'Estado':self.Estado,
            'Inicio':self.Inicio,
            'Fin':self.Fin
        }   