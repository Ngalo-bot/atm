

   
      const placeAmt=(num)=>{
            const number=num;
            const currentval=$("#amount").val();
            const newval=currentval+number;
            $("#amount").val(newval);
      }

      const placepin=(num)=>{
        const number=num;
        const currentval=$("#pin").val();
        const newval=currentval+number;
        $("#pin").val(newval);
  }

      const backspace=()=>{
        const newvar=$("#amount").val().slice(0,-1);
        $("#amount").val(newvar);
        console.log(newvar);
      }

     
        
        // swal({
        //     title:"Error!",
        //     text:"Something went wrong",
        //     icon:"error",
        //     button:"Ok",
        // })
    

      const verify=(msg,user)=>{        
        $.ajax({
            type:'POST',
            url:'config/socket.php',
            data:{message:msg,id:user},
            success:function(data){
                console.log(data);
            }
        })
      }

        $("#closemodal").click(function(){
        
            $('#putfinger').modal('hide');
      });

     


 