<!-- шаблон находится в файле resources/views/about.blade.php:  -->

<html>
   <body>
       <h1>Hello {{$name}}, in Test Controller!</h1>

        <a href={{ route('about') }}>Генерирование URL...</a>

   </body>
</html>