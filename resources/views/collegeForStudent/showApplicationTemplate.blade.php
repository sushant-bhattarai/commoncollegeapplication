<!DOCTYPE html>
<html>
  <head>
    <title>Application form for {{$college->name}} </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, label {
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 13px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      line-height: 50px;
      font-size: 50px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0  #004d00;
      }
      .banner {
      position: relative;
      height: 320px;
      /* background-image: url("/uploads/media/default/0001/02/c80634ee5d31493e4ef09a6c21a6fbe0c5936c01.jpeg");   */
      background-size: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.4);
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:#004d00;
      }
      .item input:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #004d00;
      color:#004d00;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      }
      .item i {
      right: 2%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background: #004d00;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #008000;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input,.name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
  </head>
  <body>
    <div class="testbox">
      <form action="">
        <div class="banner">
          <h1>{{$college->name}}</h1><br>
          <h4>{{$college->address}}</h4>
        </div>
        <div class="item">
          <label for="name">Name<span>*</span></label>
          <div class="name-item">
            <input id="name" type="text" name="name" placeholder="First" required/>
            <input id="name" type="text" name="name" placeholder="Last" required/>
          </div>
        </div>
        <div class="item">
          <label for="bdate">Date of Birth<span>*</span></label>
          <input id="bdate" type="date" name="bdate" required/>
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <div class="name-item">
            <div>
              <label for="address">Email Address<span>*</span></label>
              <input id="address" type="text" name="address" required/>
            </div>
            <div>
              <label for="number">Phone Number</label>
              <input id="number" type="tel" name="number" />
            </div>
          </div>
        </div>
        <div class="item">
          <div class="name-item">
            <div>
              <label for="language">Which languages do you speak?</label>
              <input id="language" type="text" name="languages" />
            </div>
            <div>
              <label for="nationality">Nationality of your Passport</label>
              <input id="nationality" type="text" name="Nationality" />
            </div>
          </div>
        </div>
        <div class="item">
          <div class="name-item">
            <div>
              <label for="country">In which country do you like to get a job?</label>
              <input id="country" type="text" name="country" />
            </div>
            <div>
              <label for="job">The job you want to apply for?</label>
              <input id="job" type="text" name="job" />
            </div>
          </div>
        </div>
        <div class="item">
          <label for="apply">Why do you apply for this job?</label>
          <input id="apply" type="text" name="text"/>
        </div>
        <div class="item">
          <label for="period">The period you would like to work in this job?</label>
          <input id="period" type="text" name="text"/>
        </div>
        <div class="item">
          <label for="cv">Upload CV<span>*</span></label>
          <input  id="cv" type="file" required/>
        </div>
        <div class="item">
          <label for="cover">Cover Letter<span>*</span></label>
          <input  id="cover" type="file" required/>
        </div>
        <div class="item">
          <label for="picture">Upload Picture</label>
          <input id="picture" type="file"/>
        </div>
        <div class="item">
          <label for="video">Video Presentation</label>
          <input  id="video" type="file"/>
        </div>
        <!-- <div class="btn-block">
          <button type="submit" href="/">APPLY</button>
        </div> -->
      </form>
    </div>
  </body>
</html>