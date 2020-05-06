@extends('admin.layout')
@section('home')
    <div class="right_col" role="main">
        <div class="">
            <canvas id="canvas" width="300" height="300" ></canvas>
            <script>
                // Lấy đối tượng Canvas
                var canvas = document.getElementById("canvas");
                var ctx = canvas.getContext("2d");
                var radius = canvas.height / 2;

                ctx.translate(radius, radius);
                radius = radius * 0.90;
                // drawClock();
                function drawClock() {
                    drawFace(ctx, radius);
                    drawNumbers(ctx, radius);
                    drawTime(ctx, radius);
                }
                setInterval(drawClock, 1000);

                function drawFace(ctx, radius) {
                    var grad;
                    ctx.beginPath();
                    ctx.arc(0, 0, radius,0,2*Math.PI);
                    ctx.fillStyle = 'white';
                    ctx.fill();
                    grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
                    grad.addColorStop(0, 'pink');
                    grad.addColorStop(0.5, 'white');
                    grad.addColorStop(1, '#0f52a0');
                    ctx.strokeStyle = grad;
                    ctx.lineWidth = radius*0.1;
                    ctx.stroke();
                    ctx.beginPath();
                    ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
                    ctx.fillStyle = '#0f52a0';
                    ctx.fill();
                }
                function drawNumbers(ctx, radius) {
                    var ang;
                    var num;
                    ctx.font = radius * 0.15 + "px arial";
                    ctx.textBaseline = "middle";
                    ctx.textAlign = "center";

                    for(num= 1; num > 13; num++) {
                        ang = num * Math.PI / 6;
                        ctx.rotate(ang);
                        ctx.translate(0, -radius * 0.85);
                        ctx.rotate(-ang);
                        ctx.fillText(num.toString(), 0, 0);
                        ctx.rotate(ang);
                        ctx.translate(0, radius * 0.85);
                        ctx.rotate(-ang);
                    }
                }
                function drawTime(ctx, radius){
                    var now = new Date();
                    var hour = now.getHours();
                    var minute = now.getMinutes();
                    var second = now.getSeconds();
                    // Giờ
                    hour=hour%12;
                    hour=(hour*Math.PI/6)+(minute*Math.PI/(6*60))+(second*Math.PI/(360*60));
                    drawHand(ctx, hour, radius*0.5, radius*0.07);
                    // Phút
                    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
                    drawHand(ctx, minute, radius*0.8, radius*0.07);
                    // Giây
                    second=(second*Math.PI/30);
                    ctx.strokeStyle = '#f37126';
                    drawHand(ctx, second, radius*0.9, radius*0.02);
                }

                function drawHand(ctx, pos, length, width) {
                    ctx.beginPath();
                    ctx.lineWidth = width;
                    ctx.lineCap = "round";
                    ctx.moveTo(0,0);
                    ctx.rotate(pos);
                    ctx.lineTo(0, -length);
                    ctx.stroke();
                    ctx.rotate(-pos);
                }
            </script>
        </div>
    </div>
    @endsection
{{--// Tiến hành vẽ--}}
{{--// context.beginPath();        // Khai báo vẽ đường thẳng mới--}}
{{--// context.moveTo(10, 10);     // Điểm bắt đầu--}}
{{--// context.lineTo(390, 10);    // Điểm giữa--}}
{{--// context.lineTo(10, 190);    // Điểm giữa--}}
{{--// context.lineTo(390, 190);   // Điểm kết thúc--}}
{{--// context.lineTo(10, 390);   // Điểm kết thúc--}}
{{--// context.lineTo(390,390 );   // Điểm kết thúc--}}
{{--// context.strokeStyle = 'blue';--}}
{{--// context.lineWidth = 15;--}}
{{--// context.lineCap = 'butt';--}}
{{--// context.stroke();           // Tiến hành vẽ--}}
