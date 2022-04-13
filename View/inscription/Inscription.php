
<main id="container " class="container mt-5">

<h1 class="mb-5 text-center" >Page D'inscription</h1>

<form method="POST" action="" >
  <div class="form-group row mb-3 justify-content-center">
    <label for="input_Username" class="col-sm-1 col-form-label">Pseudo</label>
    <div class="col-lg-3 my-1">
      <input name="user_Name" type="text" class="form-control" id="input_Username" placeholder="Pseudo">
    </div>
  </div>
  <div class="form-group row mb-3 justify-content-center">
    <label for="input_email" class="col-sm-1 col-form-label">Email</label>
    <div class="col-lg-3 my-1">
      <input name="email" type="email" class="form-control" id="input_email" placeholder="Email">
    </div>
  </div>
  <div class="form-group row mb-3 justify-content-center">
    <label for="inputPassword3" class="col-sm-1 col-form-label">Password</label>
    <div class="col-lg-3 my-1">
      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group row mb-3 justify-content-center">
    <label for="inputAge" class="col-sm-1 col-form-label">Age</label>
    <div class="col-lg-3 my-1">
      <input type="number" name="age" class="form-control" id="inputAge" placeholder="Age">
    </div>
  </div>
  <div class="form-group row mb-3 d-flex justify-content-center">
    <label for="inputCountry" class="col-sm-1 col-form-label ">Pays</label>
    <div class="col-lg-3 my-1">
      <input name="country" type="text" class="form-control" id="inputAge" placeholder="Votre Pays">
    </div>
  </div>
    

  <div class="form-group row mx-auto justify-content-center">
    <div class="col-lg-10 d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">S'inscrire</button>
    </div>
  </div>
</form>
</main>