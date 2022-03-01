<body>
<div class="container">
    <script>
        function pkgHandler(pkg){
            
        }
    </script>
    <div class="card m-4">
    <div class="row">
        <div  class="form-group col-4" >
        <label for="exampleFormControlFile1">Packages</label>
        <select  class="form-select" onchange ='pkgHandler(this.value)'  aria-label="Default select example" name="pkg" id="forWho">
            <option value="Silver" >Silver</option>
            <option value="Gold" >Gold</option>
            <option value="Platinum" >Platinum</option>
        </select>
        </div>
        <div id="desc" class="mt-3 col-7 border">
        This is the description of the silver pakage
        <h5 id="amount" class="text-success">Amount: 300 birr </h5>
        </div>
    </div>
    </div>
</div>
</body>