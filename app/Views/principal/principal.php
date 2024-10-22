body 
{
    display: flex;
    flex-direction: row;
    margin: 0;
    padding: 0;
    height: 100%;

    font-family: Noto Sans, sans-serif;
}

.fotologin
{
    width: 50vw; 
    height: 100vh; 
    background-image: url('istockphoto-1460124878-612x612.jpg'); 
    background-size: 100% 100%; 
    background-position: center; 
    background-repeat: no-repeat;
}

.quadradocor {
    position: absolute; 
    top: 50%; 
    left: 25%; 
    transform: translate(-50%, -50%); 
    width: 50vw; 
    height: 100vh; 
    background: linear-gradient(to bottom, rgba(195, 83, 247, 0.301), rgba(0, 0, 0, 0.858));

    display: flex;
    flex-direction: column;
    justify-content: end;
    align-items: center;

    color: white;

    text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;
}

.loginesquerda
{
    /*background: #f33232;*/
    width: 50vw; 
    height: 100vh; 
    left: 75%;

    display: flex;
    flex-direction: column;

    justify-content: center;
    align-items: center;

    
}

.logo 
{
    background: #000;
    border-radius: 50%;
    width: 15%;
    height: 15%;
    margin-bottom: 50px;
    margin-top: 30px;
}

.login
{
    width: 75%;
    height: 75%;
    /*background: #f1f1f1;*/

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    margin-top: 100px;

    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    
}

.inputs
{
    display: flex;
    flex-direction: column;
    justify-content: start;
    /*background: #7555f259;*/
    width: 75%; 
    height: 75%; 
    margin-bottom: 5px;
}

input
{
    height: 35px;
    border-radius: 15px;
    border: 1px solid black;
}

a
{
    margin-bottom: 10px;
    color: rgb(41, 41, 216);
    text-decoration-color: rgb(41, 41, 216);
}

button
{
    width: 200px;
}





