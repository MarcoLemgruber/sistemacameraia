function adicionarCamera() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'http://localhost:5000/add_camera', true);
  xhr.send();
}