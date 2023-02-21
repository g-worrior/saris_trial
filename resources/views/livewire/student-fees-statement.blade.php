<div class="d-flex flex-column align-items-center">
    <h4>Skyline University</h4>
    <img src="/images/AdminLTELogo.png" alt="Institution logo"
        class="mb-3" style="max-width: 100px;">
    <address>
        123 Main Street<br>
        Zomba, Malawi<br>
        Phone: (555) 555-5555<br>
        Email: info@institution.com
    </address>
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
        <div class="row justify-content-end">
            <div class="col-auto">
                <div class="row">
                    <div class="col-5 text-right">
                        Total:
                    </div>
                    <div class="col-9 text-right">
                        MK{{ $balance }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="d-flex justify-content-end mb-3">
    <!-- Add print button here -->
    <button class="btn btn-primary" onclick="window.print()">Print Statement</button>
</div>
