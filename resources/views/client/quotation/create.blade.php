@extends('layouts.app')

@section('content')
    <style>
        .upload-box {
            border: 2px dashed #4C5370;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            background-color: #f8f9fa;
        }

        .upload-box:hover {
            background-color: #e2e6ea;
        }

        .upload-box p {
            margin: 0;
            font-size: 16px;
            color: #4C5370;
        }
    </style>
    <div class="container" style="min-height: 70vh">
        <h1 class="text-center mt-5">Request Quotation</h1>
        <form action="{{ route('quotation.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="serviceType">Select Quotation</label>
                <select id="serviceType" name="quotation" class="form-select" required>
                    <option value="">Please select</option>
                    <option value="Sticker">Sticker</option>
                    <option value="Outdoor Signage">Outdoor Signage</option>
                    <option value="Indoor Signage">Indoor Signage</option>
                    <option value="Shirt Printing">Shirt Printing</option>
                    <option value="Souvenir">Souvenir</option>
                    <option value="Tarpaulin">Tarpaulin</option>
                    <option id="custom" value="">Custom..</option>
                </select>
            </div>
            <div id="priceInput" class="form-group mt-3 mb-3" style="display: none;">
                <label for="price" class="mb-2">Type of Services</label>
                <input type="text" class="form-control" id="price">
            </div>
            @error('quotation')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mb-3">
                <label for="image" class="mb-2">Images</label>
                <div class="upload-box" onclick="document.getElementById('formFileMultiple').click();">
                    <p>Click to upload files</p>
                </div>
                <input class="form-control d-none" name="images[]" type="file" id="formFileMultiple" multiple>
            </div>
            @error('images.*')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="mb-3">
                <label for="name" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="name">
            </div>
            @error('quantity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="phone" name="phone_number" pattern="\d{11}"
                    title="Phone number must be 11 digits" maxlength="11">
            </div>
            @error('phone_number')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
    </div>

    <script>
        document.getElementById('formFileMultiple').onchange = function() {
            const fileInput = document.getElementById('formFileMultiple');
            const textBox = document.querySelector('.upload-box p');

            let totalFileCount = 0; // Variable to store the total count of files

            if (fileInput.files && fileInput.files.length > 0) {
                // Calculate the total count of files by adding previously selected files and new files
                totalFileCount += fileInput.files.length;
            }

            if (totalFileCount > 0) {
                textBox.textContent = totalFileCount + " files selected";
            } else {
                textBox.textContent = "Click to upload files";
            }
        };
        $(document).ready(function() {
            $('#serviceType').change(function() {
                // Find the selected option and check its id attribute
                if ($(this).find(':selected').attr('id') === 'custom') {
                    // Show the price input
                    $('#priceInput').show();

                    // Get the value of the input
                    var customValue = $('#price').val();

                    // Update the value attribute of the "Custom.." option
                    $('#custom').attr('value', customValue);
                } else {
                    // Hide the price input if the selected option does not have id 'custom'
                    $('#priceInput').hide();
                }
            });
            // Add an input event listener for real-time updates
            $('#price').on('input', function() {
                // Get the value of the input
                var customValue = $(this).val();

                // Update the value attribute of the "Custom.." option
                $('#custom').attr('value', customValue);

                // Log the value to the console (for debugging purposes)
                console.log('Input value:', customValue);
            });
        });
    </script>
@endsection
