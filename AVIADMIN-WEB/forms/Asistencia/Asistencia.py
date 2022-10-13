class Asistencia:
    def __init__(self, identificador, nombre, fecha, inicio, Operativo,puesto,fin):
        self.identificador=identificador
        self.nombre=nombre
        self.fecha=fecha
        self.inicio=inicio
        self.Operativo=Operativo
        self.puesto=puesto
        self.fin=fin
        
    def datosAsistenciaJson(self):
        return{
            'identificador':self.identificador,
            'Fecha':self.nombre,
            'Nombre':self.fecha,
            'Inicio':self.inicio,
            'Estado':self.Operativo,
            'Puesto':self.puesto,
            'Fin':self.fin
            }   