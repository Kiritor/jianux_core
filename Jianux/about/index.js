var keyboardMap = {
  "type": "german",
  192: 0,
  49: 1,
  50: 2,
  51: 3,
  52: 4,
  53: 5,
  54: 6,
  55: 7,
  56: 8,
  57: 9,
  48: 10,
  189: 11,
  187: 12,
  8: 13,
  9: 14,
  81: 15,
  87: 16,
  69: 17,
  82: 18,
  84: 19,
  90: 20,
  85: 21,
  73: 22,
  79: 23,
  80: 24,
  219: 25,
  187: 26,
  13: 27,
  20: 28,
  65: 29,
  83: 30,
  68: 31,
  70: 32,
  71: 33,
  72: 34,
  74: 35,
  75: 36,
  76: 37,
  186: 38,
  222: 39,
  220: 40,
  16: 42,
  188: 43,
  89: 44,
  88: 45,
  67: 46,
  86: 47,
  66: 48,
  78: 49,
  77: 50,
  188: 51,
  190: 52,
  189: 53,
  16: 54,
  17: 56,
  18: 57,
  91: 58,
  32: 59,
  93: 60,
  18: 61,
  37: 62,
  38: 63,
  39: 65,
  40: 64,
  60: 43,
  44: 51,
  223: 11,
  45: 53,
  63: 11,
  43: 26
}

var keyboardKeys = {
  "type": "german",
  0: ["&deg;","&#x5E;"],
  1: ["!","1"],
  2: ["\"","2"],
  3: ["§","3"],
  4: ["$","4"],
  5: ["%","5"],
  6: ["&","6"],
  7: ["/","7"],
  8: ["(","8"],
  9: [")","9"],
  10: ["=","0"],
  11: ["?","ß"],
  12: ["`","´"],
  13: ["&larr;"],
  14: ["&#x21e5;"],
  15: ["Q"],
  16: ["W"],
  17: ["E"],
  18: ["R"],
  19: ["T"],
  20: ["Z"],
  21: ["U"],
  22: ["I"],
  23: ["O"],
  24: ["P"],
  25: ["Ü"],
  26: ["*","+"],
  27: ["&#x21a9;"],
  28: ["&#x21ea;"],
  29: ["A"],
  30: ["S"],
  31: ["D"],
  32: ["F"],
  33: ["G"],
  34: ["H"],
  35: ["J"],
  36: ["K"],
  37: ["L","@"],
  38: ["Ö"],
  39: ["Ä"],
  40: ["'","#"],
  42: ["&#x21e7;"],
  43: [">","<"],
  44: ["Y"],
  45: ["X"],
  46: ["C"],
  47: ["V"],
  48: ["B"],
  49: ["N"],
  50: ["M"],
  51: [";",","],
  52: [":","."],
  53: ["_","-"],
  54: ["&#x21e7;"],
  55: ["fn"],
  56: ["ctrl"],
  57: ["alt","⌥"],
  58: ["cmd","⌘"],
  60: ["⌘","cmd"],
  61: ["alt","⌥"],
  62: ["&#9664;"],
  63: ["&#9650;"],
  64: ["&#9660;"],
  65: ["&#9658;"]
}

$(document).ready(function(){
  $("body").addClass("light");
  $('textarea[name="message"]').focus();
  $(".wrapper ul li").each(function(i){
    if(keyboardKeys[i]){
      if(keyboardKeys[i].length > 1){
        var string = "";
        if(i==58 || i==60){
          for(var j=0;j<keyboardKeys[i].length;j++){
            string += keyboardKeys[i][j]+"&nbsp; &nbsp; &nbsp;";
          }
          $(".text", this).html(string).css("width","55px").css("margin-left","2px").css("margin-top","23px");
        }
        else{
          for(var j=0;j<keyboardKeys[i].length;j++){
            string += keyboardKeys[i][j]+"<br>";
          }
          $(".text", this).html(string); 
        }
      }
      else{
        $(".text", this).html(keyboardKeys[i][0]).css("margin-top","13px"); 
      }
      if(i==55 || i==56){
        $(".text", this).html(keyboardKeys[i][0]).css("margin-top","23px").css("margin-left","-8px"); 
      }
      if(i==57||i==61){
        $(".text", this).html($(".text", this).html()).css("margin-top","-2px").css("margin-left","-8px").css("line-height","22px"); 
      }
      if(i==61){
        $(".text", this).css("margin-left","9px");
      }
      if(i > 61){
        $(".text", this).css("margin-top","3px");
      }
    }
  });
  
  $(".switch").click(function(){
     $(this).toggleClass("on");
     $("body").toggleClass("light");
  });

  document.addEventListener("keypress",function(e){
	 
    if(e.keyCode == 60 || e.keyCode == 44 || e.keyCode == 45 || e.keyCode == 223 || e.keyCode == 63 || e.keyCode == 43){
      keyDownAni(keyboardMap[e.keyCode],e);
    }
    if(!$('textarea[name="message"]').is(":focus")){
      e.preventDefault();
    }
  });
  
  document.addEventListener("keyup",function(e){
    if(e.keyCode == 8 || e.keyCode == 9){
      if(!$('textarea[name="message"]').is(":focus")){
        e.preventDefault();
      }
    }
    setTimeout(function(){
      if(e.shiftKey && e.keyCode == 16){
      var loc = e.location;
      if(loc == 1){
        //left
        keyDownAni(42,e);
      }
      else if(loc == 2){
        //right
        keyDownAni(54,e);
      }
    }
    else if(e.altKey && e.keyCode == 18){
      if(e.location == 1){
        //left
        keyDownAni(57,e);
      }
      else if(e.location == 2){
        //left
        keyDownAni(61,e);
      }
    }
    else if(e.keyCode == 187 || e.keyCode == 188 || e.keyCode == 189 || e.keycode == 191){
      
    }
    else{
      keyDownAni(keyboardMap[e.keyCode],e);
    }
    },10);
  });
});

function keyDownAni(eq,e){
  var randLetter = String.fromCharCode(65 + Math.floor(Math.random() * 26));
  var uid = randLetter + Date.now();
  var sk = isCapslock(e);
  if(sk){
    $(".wrapper ul li").eq(eq).children(".text").toggleClass("active");
  }
  else{
    $(".wrapper ul li").eq(eq).children(".text").toggleClass("active");
  }
  $(".wrapper ul li").eq(eq).addClass("activeKey");
  $(".wrapper ul li").eq(eq).attr("id",uid);
  $("#"+uid+" .finger").animate({
    opacity: 1,
    width: "30px",
    height: "30px",
    top: "0px",
    left: "0px"
  },300, function(){ 
    $("#"+uid+" .finger").animate({
      opacity: 0,
      width: "40px",
      height: "40px",
      top: "-5px",
      left: "-5px"
    },300,function(){
      $("#"+uid+" .finger").eq(eq).removeClass("activeKey");
    });
  });
}

function isCapslock(e){
    e = (e) ? e : window.event;
    var charCode = false;
    if (e.which) {
        charCode = e.which;
    } else if (e.keyCode) {
        charCode = e.keyCode;
    }
    var shifton = false;
    if (e.shiftKey) {
        shifton = e.shiftKey;
    } else if (e.modifiers) {
        shifton = !!(e.modifiers & 4);
    }
    if (charCode >= 97 && charCode <= 122 && shifton) {
        return true;
    }
    if (charCode >= 65 && charCode <= 90 && !shifton) {
        return true;
    }
    return false;
}