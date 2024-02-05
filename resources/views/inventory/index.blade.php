@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header">
                Select Inventory
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4>7J Shop Inventory</h4>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                @php
                                    $inventoryId = 1; // Replace this with your dynamic or fixed ID
                                @endphp
                                <a href="{{ route('inventory.show', $inventoryId) }}" class="btn btn-primary">See</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4>JC Signmaker Branch</h4>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                 @php
                                    $inventoryI = 2; // Replace this with your dynamic or fixed ID
                                @endphp
                                 <a href="{{route('inventory.show', $inventoryI)}}" class="btn btn-primary">See</a> 
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4>B2B Designs and Printing Services Branch</h4>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                 @php
                                    $inventory = 20; // Replace this with your dynamic or fixed ID
                                @endphp
                                <a href="{{route('inventory.show', $inventory)}}" class="btn btn-primary">See</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}

    <div class="modal" id="passwordModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Enter Password</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <input type="password" id="passwordInput" class="form-control mb-2" placeholder="Password">
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Close</a>
                    <button type="button" class="btn btn-primary" id="submitModalBtn">Submit</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Show the modal on document ready
            $("#passwordModal").modal('show');

            // Your secret password
            var correctPassword = "{{ $password->password }}";

            // Function to check password
            function checkPassword() {
                var enteredPassword = $("#passwordInput").val();
                if (enteredPassword === correctPassword) {
                    // Password is correct, reveal the content
                    Swal.fire({
                        icon: 'success',
                        title: 'Welcome',
                    });
                    $("#passwordModal").modal('hide'); // Hide the modal
                } else {
                    // Password is incorrect, you can show an error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Wrong password please try again',
                    });
                }
            }

            // Event listener for the modal submit button
            $("#submitModalBtn").click(function() {
                checkPassword();
            });

            // Event listener for the modal close event
            $('#passwordModal').on('hide.bs.modal', function(e) {
                // Prevent the modal from closing if the password is incorrect
                if ($("#passwordInput").val() !== correctPassword) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Please enter the password',
                    });
                    e.preventDefault();
                }
            });

            // You can also trigger the checkPassword function on pressing Enter in the password input
            $("#passwordInput").keypress(function(event) {
                if (event.which === 13) { // Enter key
                    checkPassword();
                }
            });
        });
    </script>
@endsection
