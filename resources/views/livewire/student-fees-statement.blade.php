<div class="card">
    <div class="card-body">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <div class="d-flex flex-column align-items-start">
                    <h4>Skyline University</h4>
                    <img src="/images/AdminLTELogo.jpeg" alt="Institution logo" class="mb-3" style="max-width: 100px;">
                    <address>
                        123 Main Street<br>
                        Zomba, Malawi<br>
                        Phone: (555) 555-5555<br>
                        Email: info@institution.com
                    </address>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-column">
                    <div class="mb-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Name:</label>
                            </div>
                            <div class="col-md-8">
                                <p id="name">{{ $student->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="regi_no">RegiNo:</label>
                            </div>
                            <div class="col-md-8">
                                <p id="regi_no">{{ $student->student_regi_no }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <ul class="list-group">
            <li class="list-group-item text-white bg-dark font-weight-bold text-uppercase">
                <div class="d-flex justify-content-between">
                    <div>Date</div>
                    <div>Description</div>
                    <div>Amount</div>
                </div>
            </li>
            @foreach ($fees_statement as $item)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>{{ $item['created_at']->format('Y-m-d') }}</div>
                        <div>{{ $item['description'] ?? '' }}</div>
                        <div>{{ $item['type'] == 'receipt' ? '- ' : '' }}{{ $item['amount'] }}</div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h4>Balance:</h4>
                    </div>
                    <div class="col-sm-2 d-flex flex-column align-items-end breadcrumb" id="fees">
                    </div>
                </div>
        
            </div>
        </div>       
        <script>
            const balance = {{ $balance }}
            const result = balance.toLocaleString('en-US');
            document.getElementById("fees").innerHTML = "MK " + result;
        </script>
        
    </div>
</div>
