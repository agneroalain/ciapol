function drag_drop(event){
    event.preventDefault();
    alert(event.dataTransfer.files[0]);
    alert(event.dataTransfer.files[0].name);
    alert(event.dataTransfer.files[0].size+ " Bytes");
}