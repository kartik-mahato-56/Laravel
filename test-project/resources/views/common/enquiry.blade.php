<form action="{{route('enquiry')}}" method="post">
    @csrf

    <div class="card-body">
        <h5 class="card-title">Enquiry Form</h5>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label mb0">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter name">
            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label mb0">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label mb0">Mobile No.</label>
            <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Enter mobile no.">
            <span class="text-danger">
                @error('phone')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label mb0">Say Hi!</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-1 mb-0">Submit</button>
        </div>
    </div>

</form>
