    // logout
    function logout(){
        location.href = "../auth/logout.php";
    }

    function exit(){
        location.reload();
    }

    var player;
    var rintangan = [];
    var score;
    var username;

    function startGame(a, riwayat){

        var loby = document.getElementById("wrapper");
        var arena = document.getElementById("arena");
        var akun = document.getElementById("akun");
        var color = document.getElementById("color").value;
        
        loby.style.display = "none";
        arena.style.display = "block";
        document.getElementById("footer").style.marginTop = "132px";

        player = new component(40, 40, "../assets/img/player2.png", 5, 67, "image");
        score = new component("25px", "Consolas", "black", 810, 30, "text");
        akun.style.color = color;
        field.start(a, riwayat);
        
        rintangan = [];
    }

    var field = {
        canvas : document.createElement("canvas"),
        start : function (b, history) {
            this.canvas.width = 1000;
            this.canvas.height = 500;
            this.context = this.canvas.getContext("2d");
            this.identifier = b;
            this.history = history;

            document.getElementById("arena").insertBefore(this.canvas, document.getElementById("arena").childNodes[0]);

            this.frameNo = 0;
            this.interval = setInterval(updateGame, 8);

            window.addEventListener("keydown", function(e){
                field.keys = (field.keys || []);
                field.keys[e.keyCode] = (e.type == "keydown");
                // console.log(b);
            })
            
            window.addEventListener("keyup", function(e){
                field.keys[e.keyCode] = (e.type == "keydown");
                // console.log(field.keys[e.keyCode]);
            })

        },
        clear : function(){

            this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
            
        },
        stop : function(){
            clearInterval(this.interval);
        }

    }

    function component(width, height, color, x, y, type){
        this.type = type;
        
        if(type == "image"){
            this.image = new Image();
            this.image.src = color;
        }

        this.width = width;
        this.height = height;
        this.speedX = 0;
        this.speedY = 0;
        this.x = x;
        this.y = y;

        this.update = function(){
            ctx = field.context;

            if(type == "image"){

                ctx.drawImage(this.image, this.x, this.y, this.width, this.height);

            } else if(type == "text"){

                ctx.font = this.width + " " + this.height;
                ctx.fillStyle = color;
                ctx.fillText(this.text, this.x, this.y);
                
            }else{
                ctx.fillStyle= color;
                ctx.fillRect(this.x, this.y, this.width, this.height);
            }
        }

        // control
        this.controler = function(){
            this.x += this.speedX;
            this.y += this.speedY;
        }

        //crash
        this.crashWith = function(object){

            // player
            var left = this.x;
            var right = this.x + (this.width);
            var top = this.y;
            var bottom = this.y + (this.height);

            // rintangan (objek lain)
            var left2 = object.x;
            var right2 = object.x + (object.width);
            var top2 = object.y;
            var bottom2 = object.y + (object.height);

            var crash = true;

            if( (bottom < top2) || (top > bottom2) || (right < left2)  || (left > right2) ){
                crash = false;
            }

            return crash;
        }
    }

    function updateGame(){

        var pilih_menu = document.getElementById("pilih_menu");
        var best_score = document.getElementById("best_score");
        var score_now = document.getElementById("score_now");

        
        var x,height, gap, minHeight, maxHeight, minGap, maxGap;
        
        score.text = field.frameNo;
        
        for(i=0; i < rintangan.length; i++){
            
            
            if(player.crashWith(rintangan[i])){

                field.stop();
                pilih_menu.style.display = "flex";
                
                // menampilkan score
                // score_now.textContent = "Score Now : "+ score.text
                // best_score.textContent = "Best Score : "+ field.history
                
                console.log(field.identifier);
                console.log(field.history);
                
                $.ajax({
                    method : "POST",
                    data : "score="+score.text+"&username="+field.identifier,
                    url : "../auth/score.php",
                    success : function (ress){
                        console.log(ress)
                    }
                })
                
                return;
            }
        }
            
        field.clear();
        field.frameNo += 1;
        
        if(field.frameNo == 1 || everyinterval(115)){
            x = field.canvas.width
            minHeight = 70;
            maxHeight = 200;
            
            height = Math.floor(Math.random() * (maxHeight - minHeight + 1) + minHeight);
            
            // console.log(height);
            
            minGap = 70;
            maxGap = 100;
            
            gap = Math.floor(Math.random() * (maxGap - minGap + 1) + minGap);
            rintangan.push(new component(20, height, "green", x, 0)); // mencetak serta mengatur posisi rintangan ketika pertama kali dibuat

            rintangan.push(new component(20, x - height - gap, "green", x, height + gap));

            // console.log(height + gap);

            // console.log(x - height - gap);
        }
        
        for(i = 0; i < rintangan.length; i++){

            // moving rintangan
            rintangan[i].x -= 1;
            rintangan[i].update();
            
        }
        
        score.text = "Score : " + field.frameNo;
        score.update();
        
        //stop moving
        player.controler();
        player.update();
        
        player.speedX = 0;
        player.speedY = 0;
        
        if(field.keys && field.keys[87]){
            player.speedY = -1;
        }
        if(field.keys && field.keys[83]){
            player.speedY = 1;
        }

    }

    function everyinterval(n){
        if( (field.frameNo / n) % 1 == 0 ){
            return true;
        }
        return false;
    }

    function tryAgain(user , history){

        console.log(user);
        
        console.log(history);

        field.stop();
        field.clear();
        startGame(user, history);

        
        pilih_menu.style.display = "none";
        
    }
