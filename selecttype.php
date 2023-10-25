<!DOCTYPE html>
<html>
<head>
  <style>
    body
    {
        background-image: url("https://s3.rdbuz.com/web/images/homeV2/HomeBannerImg.svg");
        background-size: cover;
        background-repeat: no-repeat;
    }
    /* Style for  box */
    .main {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #f9f9f9;
      border: 1px solid #ccc;
      padding: 20px;
      width: 320px;
      text-align: center;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
      z-index: 9999;
    }

    /* Style for the buttons */
    .button {
      display: inline-block;
      padding: 10px 20px;
      margin: 10px;
      font-size: 16px;
      text-align: center;
      cursor: pointer;
    }

    .button-primary,.button-secondary {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      width: 300px;
    }

   
  </style>
</head>
<body>
  <!-- Pop-up box content -->
  <div class="main">
    <h2>Select Report Type</h2>
    <p>Choose an option:</p>
    <a style="text-decoration: none;" href="dailyreport.php">
    <button class="button button-primary">Daily Report</button></a>

    <a style="text-decoration: none;" href="paymentreport.php">
    <button class="button button-secondary">Payment Report</button></a>

    <a style="text-decoration: none;" href="dashboard.php">
    <button class="button button-primery">Back</button></a>

  </div>

 
</body>
</html>
