@include('admin.include.header')


<div class="page-content">


    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Billing & Subscription</h4>
        </div>


    </div>

    <form method="POST" action="{{ route('admin.subscription_plans.update', $subscriptionPlan->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $subscriptionPlan->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $subscriptionPlan->amount) }}" required>
        </div>

        <div class="mb-3">
            <label>From SQFT</label>
            <input type="number" name="from_sqft" class="form-control" value="{{ old('from_sqft', $subscriptionPlan->from_sqft) }}" required>
        </div>

        <div class="mb-3">
            <label>To SQFT</label>
            <input type="number" name="to_sqft" class="form-control" value="{{ old('to_sqft', $subscriptionPlan->to_sqft) }}" required>
        </div>

        <div class="mb-3">
            <label>Features</label>
            <div id="features-wrapper">
                @php
                    $features = old('features', $subscriptionPlan->features ?? ['']);
                @endphp
                @foreach($features as $feature)
                    <div class="feature-item mb-2">
                        <input type="text" name="features[]" class="form-control d-inline-block w-75" value="{{ $feature }}" required>
                        <button type="button" class="btn btn-danger btn-sm remove-feature">X</button>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-success btn-sm mt-2" id="add-feature">Add Feature</button>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.subscription_plans.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</div>

@include('admin.include.footer')