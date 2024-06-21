import cv2
from ultralytics import YOLO
import winsound
import threading

from flask import Flask

app = Flask(__name__)

@app.route('/add_camera')
def add_camera():
    # Seu código para adicionar a câmera aqui
    video = cv2.VideoCapture(0)
    return 'Câmera adicionada com sucesso!'

if __name__ == '__main__':
    app.run(debug=True)

    video = cv2.VideoCapture(0)
    # Carregar o modelo YOLO
    modelo = YOLO('yolov8x.pt')

    alarmeCtl = False

    # Função para emitir o alarme
    def alarme():
        global alarmeCtl
        for _ in range(7):
            winsound.Beep(2500, 500)
        alarmeCtl = False

    while True:
        check, img = video.read()
        if not check:
            break
        img = cv2.resize(img, (1270, 720))
        resultado = modelo(img)

        for objetos in resultado:
            for dados in objetos.boxes:
                x1, y1, x2, y2 = map(int, dados.xyxy[0])
                cls = int(dados.cls[0])
                
                if cls == 76:
                    # Desenha o retângulo ao redor do objeto detectado
                    cv2.rectangle(img, (x1, y1), (x2, y2), (255, 0, 0), 5)
                    cv2.rectangle(img, (100, 30), (470, 80), (0, 0, 255), -1)
                    cv2.putText(img, 'INVASOR DETECTADO', (105, 65), cv2.FONT_HERSHEY_SIMPLEX, 1, (255, 255, 255), 3)
                    
                    if not alarmeCtl:
                        alarmeCtl = True
                        threading.Thread(target=alarme).start()
                if cls ==43:
                    # Desenha o retângulo ao redor do objeto detectado
                    cv2.rectangle(img, (x1, y1), (x2, y2), (255, 0, 0), 5)
                    cv2.rectangle(img, (100, 30), (470, 80), (0, 0, 255), -1)
                    cv2.putText(img, 'INVASOR DETECTADO', (105, 65), cv2.FONT_HERSHEY_SIMPLEX, 1, (255, 255, 255), 3)
                    
                    if not alarmeCtl:
                        alarmeCtl = True
                        threading.Thread(target=alarme).start()
                    

        cv2.imshow('img', img)
        if cv2.waitKey(1) & 0xFF == ord('q'):
            break

# Liberar recursos
video.release()
cv2.destroyAllWindows()
