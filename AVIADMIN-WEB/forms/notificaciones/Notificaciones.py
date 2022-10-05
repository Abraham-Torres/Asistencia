import re


class Notificacion:
    def __init__(self,identificador, cuenta, hora, contenido):
        self.identificador = identificador
        self.cuenta = cuenta
        self.hora = hora
        self.contenido = contenido

    def datosNotificacionesJson(self):
        return{
            "identificador": self.identificador,
            "cuenta": self.cuenta,
            "hora": self.hora,
            "contenido": self.contenido
        }