<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Customers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-3">
    <h2 class="mb-3">ADD NEW CUSTOMERS</h2>

    <form method="post">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" placeholder="Enter First Name">
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email">
        </div>
        <div class="col-md-6 mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" id="phone" placeholder="Enter Phone Number">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="email" class="form-label">Pin Number</label>
          <input type="number" class="form-control" id="email" placeholder="Enter Pin">
        </div>
        <div class="col-md-6 mb-3">
          <label for="phone" class="form-label">Account Number</label>
          <input type="number" class="form-control" id="phone" placeholder="Enter Account Number">
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-md-6 mb-3">
          <label for="subject" class="form-label">Customer Id</label>
          <input type="text" class="form-control" id="subject" placeholder="Enter Subject">
        </div> -->
        <div class="col-md-6 mb-3">
          <label for="message" class="form-label">Comment</label>
          <textarea class="form-control" id="message" rows="3" placeholder="Enter Message"></textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
