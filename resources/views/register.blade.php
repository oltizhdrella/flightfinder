<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: linear-gradient(135deg, #FFA500, #ff4d00);
}
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #FFA500, #ff4d00);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #ff4d00;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #FFA500;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #FFA500, #ff4d00);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #FFA500, #ff4d00);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
      .container .twitter a {
      display: block;
      height: 45px;
      width: 100%;
      font-size: 15px;
      text-decoration: none;
      padding-left: 20px;
      line-height: 45px;
      color: #fff;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .container .facebook i,
    .container .twitter i {
      padding-right: 12px;
      font-size: 20px;
    }

    .container .twitter a {
      background: linear-gradient(to right, #00acee 0%, #1abeff 100%);
      margin: 20px 0 15px 0;
    }

    .container .twitter a:hover {
      background: linear-gradient(to left, #00acee 0%, #1abeff 100%);
      margin: 20px 0 15px 0;
    }
}</style>
  <title>Register</title>
</head>
<body>
  <div>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="container">
            <div class="title">Registration</div>
            <div class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <h4 style="color:red">{{ $error }}</h4>
                    @endforeach
                </ul>
            </div>
        @endif
              <form action="{{ route('register') }}" method = 'POST'>
              {!! csrf_field() !!}
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" name="name" id="name" placeholder="Enter your full name" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="username" id="username" placeholder="Enter your username" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                  </div>
   
                  <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" id="password" minlength="8" maxlength="16" placeholder="Enter your password" required>
                  </div>
 
                </div>
                <div class="button">
                  <input type="submit" value="Register">
                </div>
              </form>
            </div>
          </div>
  <script src="js/bootstrap.boundle.min.js"></script>
</body>
</html>