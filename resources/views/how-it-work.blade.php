
@include('include.header')
 <div class="container py-3">
    <div class="row justify-content-center">
        
<div class="col-lg-8"> 
 
    <div class="contact-form-box"> 
 
        <div class="section-title"> 
            <h2 class="text-anime wow fadeInUp"> 
                Request a Demo 
            </h2> 
 
            <p> 
                Tell us about your organization and energy needs. 
                Our team will get in touch to discuss the right solution. 
            </p> 
        </div> 
 
        <div class="contact-form wow fadeInUp" data-wow-delay="0.75s"> 
 
            <form id="demoRequestForm" 
                  action="#" 
                  method="POST"> 
 
                @csrf 
 
                <div class="row"> 
 
                    <!-- Full Name --> 
                    <div class="form-group col-md-6 mb-4"> 
                        <input type="text" 
                               name="name" 
                               class="form-control" 
                               placeholder="Full Name" 
                               value="{{ old('name') }}" 
                               required> 
 
                        @error('name') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
 
                    <!-- Company --> 
                    <div class="form-group col-md-6 mb-4"> 
                        <input type="text" 
                               name="company" 
                               class="form-control" 
                               placeholder="Company Name" 
                               value="{{ old('company') }}" 
                               required> 
 
                        @error('company') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
 
                    <!-- Work Email --> 
                    <div class="form-group col-md-6 mb-4"> 
                        <input type="email" 
                               name="email" 
                               class="form-control" 
                               placeholder="Work Email" 
                               value="{{ old('email') }}" 
                               required> 
 
                        @error('email') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
 
                    <!-- Phone --> 
                    <div class="form-group col-md-6 mb-4"> 
                        <input type="text" 
                               name="phone" 
                               class="form-control" 
                               placeholder="Phone Number" 
                               value="{{ old('phone') }}" 
                               required 
                               maxlength="10" 
                               oninput="this.value = this.value.replace(/[^0-9]/g, '')"> 
 
                        @error('phone') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
 
                    <!-- Role --> 
                    <div class="form-group col-md-6 mb-4"> 
                        <select name="role" 
                                class="form-select" 
                                required> 
 
                            <option value="">Select Your Role</option> 
 
                            <option value="owner"> 
                                Owner 
                            </option> 
 
                            <option value="facility_manager"> 
                                Facility Manager 
                            </option> 
 
                            <option value="building_manager"> 
                                Building Manager 
                            </option> 
 
                            <option value="property_manager"> 
                                Property Manager 
                            </option> 
 
                            <option value="energy_manager"> 
                                Energy Manager 
                            </option> 
 
                            <option value="sustainability_manager"> 
                                Sustainability Manager 
                            </option> 
 
                            <option value="other"> 
                                Other 
                            </option> 
 
                        </select> 
 
                        @error('role') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
 
                    <!-- Building / Portfolio --> 
                    <div class="form-group col-md-6 mb-4"> 
                        <input type="text" 
                               name="building_portfolio" 
                               class="form-control" 
                               placeholder="Building / Portfolio" 
                               value="{{ old('building_portfolio') }}"> 
 
                        @error('building_portfolio') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
 
                    <!-- Number of Sites --> 
                    <div class="form-group col-md-6 mb-4"> 
                        <select name="number_of_sites" 
                                class="form-select"> 
 
                            <option value=""> 
                                Number of Buildings / Sites 
                            </option> 
 
                            <option value="1">1</option> 
                            <option value="2-5">2–5</option> 
                            <option value="6-20">6–20</option> 
                            <option value="21-50">21–50</option> 
                            <option value="50+">50+</option> 
 
                        </select> 
                    </div> 
 
                    <!-- Country / Region --> 
                    <div class="form-group col-md-6 mb-4"> 
                        <input type="text" 
                               name="region" 
                               class="form-control" 
                               placeholder="Country / Region" 
                               value="{{ old('region') }}"> 
                    </div> 
 
                    <!-- Interested In --> 
                    <div class="form-group col-md-12 mb-4"> 
 
                        <select name="interest" 
                                class="form-select" 
                                required> 
 
                            <option value=""> 
                                What are you interested in? 
                            </option> 
 
                            <option value="energy_monitoring"> 
                                Energy Monitoring 
                            </option> 
 
                            <option value="energy_optimization"> 
                                Energy Optimization 
                            </option> 
 
                            <option value="energy_assessment"> 
                                Energy Opportunity Assessment 
                            </option> 
 
                            <option value="pilot_poc"> 
                                Pilot / POC 
                            </option> 
 
                            <option value="other"> 
                                Other 
                            </option> 
 
                        </select> 
 
                    </div> 
 
                    <!-- Message --> 
                    <div class="form-group col-md-12 mb-4"> 
                        <textarea name="message" 
                                  class="form-control" 
                                  rows="4" 
                                  placeholder="Tell us about your energy needs or project">{{ old('message') }}</textarea> 
                    </div> 
 
                    <!-- Consent --> 
                    <div class="col-md-12 mb-4"> 
 
                        <div class="form-check"> 
 
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   name="terms" 
                                   id="demoTerms" 
                                   value="1" 
                                   required> 
 
                            <label class="form-check-label" 
                                   for="demoTerms"> 
 
                                I agree to the 
                                <a href="{{ route('terms.conditions') }}" 
                                   target="_blank"> 
                                    Terms &amp; Conditions 
                                </a> 
                                and 
                                <a href="{{ route('privacy.policy') }}" 
                                   target="_blank"> 
                                    Privacy Policy 
                                </a>. 
 
                            </label> 
 
                        </div> 
 
                    </div> 
 
                    <!-- Button --> 
                    <div class="col-md-12 text-center"> 
 
                        <button type="submit" 
                                class="btn-default"> 
                            Request a Demo 
                        </button> 
 
                    </div> 
 
                </div> 
 
            </form> 
 
        </div> 
 
    </div> 
 
</div> 
    </div>
 </div>
@include('include.footer')