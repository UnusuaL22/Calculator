<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculator Design</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="calculator">
        <div class="calculator-title">Calculator</div>
        
        <div class="display">
            <div class="display-sub"></div>
            <div class="display-main">0</div>
        </div>
        
        <div class="buttons">
            <!-- Row 1 -->
            <button class="btn btn-clear" id="btn-clear">AC</button>
            <button class="btn btn-clear" id="btn-toggle-sign">del</button>
            <button class="btn btn-clear" id="btn-percent">%</button>
            <button class="btn btn-operator" id="btn-divide">÷</button>
            
            <!-- Row 2 -->
            <button class="btn" id="btn-7">7</button>
            <button class="btn" id="btn-8">8</button>
            <button class="btn" id="btn-9">9</button>
            <button class="btn btn-operator" id="btn-multiply">×</button>
            
            <!-- Row 3 -->
            <button class="btn" id="btn-4">4</button>
            <button class="btn" id="btn-5">5</button>
            <button class="btn" id="btn-6">6</button>
            <button class="btn btn-operator" id="btn-subtract">−</button>
            
            <!-- Row 4 -->
            <button class="btn" id="btn-1">1</button>
            <button class="btn" id="btn-2">2</button>
            <button class="btn" id="btn-3">3</button>
            <button class="btn btn-operator" id="btn-add">+</button>
            
            <!-- Row 5 -->
            <button class="btn btn-zero" id="btn-0">0</button>
            <button class="btn" id="btn-decimal">.</button>
            <button class="btn btn-equals" id="btn-equals">=</button>
        </div>
    </div>
    <script>
      
      $(document).ready(function() {
        var currnum =[]
        $('#btn-1, #btn-2, #btn-3, #btn-4, #btn-5, #btn-6, #btn-7, #btn-8, #btn-9, #btn-0, #btn-decimal, #btn-divide, #btn-multiply, #btn-subtract,#btn-add').click(function () {
          var val = $(this).text();
          currnum.push(val);
          $.ajax({
            url:"process.php",
            method:"POST",
            data:{action:"display-num", value: currnum.join('')},
            success:function(data) {
              $('.display-main').text(data);
            }
          })
        });
        $('#btn-clear').click(function () {
          currnum = [];
          $.ajax({
            url:"process.php",
            method:"POST",
            data:{action:"display-num", value: currnum.join('')},
            success:function(data) {
              $('.display-main').text(data);
              $('.display-sub').text(0);
            }
          })
        });
        $('#btn-toggle-sign').click(function () {
          currnum.pop();
          $.ajax({
            url:"process.php",
            method:"POST",
            data:{action:"display-num", value: currnum.join('')},
            success:function(data) {
              $('.display-main').text(data);
            }
          })
        });
        $('#btn-equals').click(function () {
          $.ajax({
            url:"process.php",
            method:"POST",
            data:{action:"calculate", value: currnum.join('')},
            success:function(data) {
              $('.display-sub').text(currnum.join(''));
              $('.display-main').text(data);
              currnum = [];
            }
          })
        });
        
      });
      
    </script>
  </body>
</html>

