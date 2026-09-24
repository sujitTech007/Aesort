@include('admin.include.header')


        <div class="page-content">


            <div class="page-title-head d-flex align-items-center gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-bold mb-0 py-2">Support Tickets</h4>
                </div>

               
            </div>

            <div class="page-container">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Basic Data Table</h4>




                                <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="row py-2">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="basic-datatable_length"><label
                                                    class="form-label d-flex align-items-center">Show <select
                                                        name="basic-datatable_length" aria-controls="basic-datatable"
                                                        class="form-select w-auto">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> Entries</label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                                            <div class="gridjs-head">
                                                <div class="gridjs-search d-flex align-items-center gap-1">
                                                    <input type="search" placeholder="Type a keyword..."
                                                        aria-label="Type a keyword..."
                                                        class="gridjs-input gridjs-search-input" value="">
                                                    <button data-bs-toggle="modal" data-bs-target="#exampleModalEdit"
                                                        class="btn btn-sm btn-primary d-flex gap-1 createBtn"><i
                                                            class="ri-add-circle-fill"></i> Create</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="basic-datatable"
                                                class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                                aria-describedby="basic-datatable_info"
                                                style="position: relative; width: 1186px;">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting gridjs-th sorting_asc" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending">
                                                            Application No
                                                        </th>
                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending">
                                                            Consumer No</th>
                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending">
                                                            Circle</th>

                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending">
                                                            Division</th>
                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending">
                                                            Sub Division</th>
                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending">
                                                            Status</th>
                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending">
                                                            Action</th>
                                                    </tr>
                                                </thead>


                                                <tbody>

                                                    <tr class="odd">


                                                        <td class="dtr-control sorting_1" tabindex="0">NP/1020/2025</td>
                                                        <td>443346567568</td>
                                                        <td>CREST</td>
                                                        <td>Division 4</td>
                                                        <td>Sub Division Office 4</td>
                                                        <td>Vander Selection Pending</td>
                                                        <td>
                                                            <div
                                                                class="d-flex align-items-center justify-content-center gap-1">
                                                                <button data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalView"
                                                                    class="btn btn-default btn-icon btn-sm btn-outline-dark"><i
                                                                        class="ri-eye-line"></i></button>
                                                                <button data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalEdit"
                                                                    class="btn btn-default btn-icon btn-sm btn-outline-dark"><i
                                                                        class="ri-pencil-line"></i></button>
                                                                <button
                                                                    class="btn btn-default btn-icon btn-sm btn-outline-dark"><i
                                                                        class="ri-delete-bin-line"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7" class="hiddenRow">

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                     
                                </div>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div> <!-- end row-->







            </div>








            

        </div>


    </div>
    <!-- END wrapper -->


    <div class="modal fade" id="exampleModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Application Number NP/2010/2025</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modalListViwe-box">

                        <div class="tableStatusList mb-1">
                            <div class="row justify-content-between px-3">
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Discom:</h5>
                                    <p>Chandigarh Electricity dipartiment</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Application No:</h5>
                                    <p>NP/1020/2025</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>State:</h5>
                                    <p>Chandigarh</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Circle:</h5>
                                    <p>CREST</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Subsidy Amount(in Rs):</h5>
                                    <p>54,000</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Distric:</h5>
                                    <p>Chandigarh</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Division:</h5>
                                    <p>Division 4</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Existing Installed Capacity(kwp):</h5>
                                    <p>0.000</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Pincode:</h5>
                                    <p>160030</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Subdivision:</h5>
                                    <p>Sub Division office 4</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Proposed Capacity(kwp):</h5>
                                    <p>3.000</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Approved Capacity(kwp):</h5>
                                    <p>3.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Edit Application</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form action="#">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="applicationNo" class="form-label">Application No</label>
                                    <input type="text" class="form-control" id="applicationNo"
                                        placeholder="Enter Application No" value="NP/1020/2025">
                                </div>
                                <div class="col-md-6">
                                    <label for="consumerNo" class="form-label">Consumer No</label>
                                    <input type="text" class="form-control" id="consumerNo"
                                        placeholder="Enter Consumer No" value="443346567568">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="circle" class="form-label">Circle</label>
                                    <input type="text" class="form-control" id="circle" placeholder="Enter Circle"
                                        value="CREST">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="division" class="form-label">Division</label>
                                    <input type="text" class="form-control" id="division" placeholder="Enter Division"
                                        value="Division 4">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="subDivision" class="form-label">Sub Division</label>
                                    <input type="text" class="form-control" id="subDivision"
                                        placeholder="Enter Sub Division" value="Sub Division Office 4">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div
                                    class="modal-footer mt-4 border-0 d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@include('admin.include.footer')
