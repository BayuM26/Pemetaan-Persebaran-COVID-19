
var title = "DATA PERSEBARAN COVID-19";
var deskripsi= "prihal data persebaran COVID-19 di Kabupaten Karawang berdasarkan wilayah per-Kecamatan";
var currentLocation = window.location;
var top = (screen.height - 570) / 2;
var left = (screen.width - 570) / 2;
var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
console.log(encodeURI(title+deskripsi));
  function facebook(){
    var url="https://web.facebook.com/sharer.php?u=" + encodeURI(currentLocation);
    window.open(url,'NewWindow',params);
   }

   function twitter(){
    var url="https://twitter.com/intent/tweet?url=" + encodeURI(currentLocation) + "&text="+encodeURI(deskripsi);
     window.open(url,'NewWindow',params);
     
   }

    function whatsapp(){
      var url="https://api.whatsapp.com/send?phone=&text=" + encodeURI(title +" "+deskripsi);
      window.open(url,'NewWindow',params);
    }

    function gmail(){
     var url="https://mail.google.com/mail/?view=cm&to=&su=" + encodeURI(title) + "&body=" + encodeURI(currentLocation + deskripsi);
     window.open(url,'NewWindow',params);
    }
   function telegram(){
      var url="https://telegram.me/share/url?url=" + encodeURI(currentLocation) + "&text=" +encodeURI(title + deskripsi);
      window.open(url,'NewWindow',params);
    }
