<!DOCTYPE html>
<html lang="en">
@includeIf('html.head')
<style>
    /*body{*/
    /*    background-color: darkgray;*/
    /*}*/
</style>
<body class="animsition">

<!-- header fixed -->
@includeIf('html.header')

<!-- Slide1 -->


<!-- Banner -->
@yield('all')


<!-- Footer -->
@includeIf('html.footer')

<!--===============================================================================================-->
@includeIf('html.script')

</body>
</html>
