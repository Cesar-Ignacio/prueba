<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>EDITAR PREGUNTA CON ID {{$preg->id}}</h2>
    <form action="{{route('ActualizarPregunta',$preg->id)}}" method="POST">
        @csrf
        @method('put')
        <label>
            Pregunta:
            <br>
            <input type="text" name="Pregunta" value={{$preg->pregunta}} required>
        </label>
        
        <br>

        <label>
            Respuesta:
            <br>
            <input type="text" name="Respuesta" value={{$preg->respuesta}} required>
        </label>

        <br>

        <label >
            Autor:
            <br>
            <input type="text" name="Autor" value={{$preg->autor}} required>
        </label>
  
        <br>
        <br>
        <button type="submit">Actualizar</button>


    </form>
</body>
</html>