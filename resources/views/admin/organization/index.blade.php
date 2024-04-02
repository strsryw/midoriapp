@extends('admin.layouts.main')

@section('content')
    <h1>Organization</h1>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="chart-container">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/4.0.1/js/jquery.orgchart.min.js"></script>
    <script>
        $(document).ready(function() {
            let datasource = {
                'name': 'Suwardi',
                'title': 'Presiden',
                'children': [{
                        'name': 'Joko Pujiwidhiono',
                        'title': 'Penasihat',
                        'children': [{
                                'name': 'Giarti Susanti',
                                'title': 'Guru',
                            },
                            {
                                'name': 'Hendrik',
                                'title': 'Guru',
                            },
                            {
                                'name': 'Sutrisno',
                                'title': 'Guru',
                            }
                        ]
                    },
                    {
                        'name': 'Isnaini',
                        'title': 'Penasihat',
                        'children': [{
                                'name': 'Andika Ardi',
                                'title': 'Staff'
                            },
                            {
                                'name': 'Rosi Nungki',
                                'title': 'Staff'
                            },
                            {
                                'name': 'Trisno',
                                'title': 'Staff'
                            }
                        ]
                    },
                ]
            };

            $('#chart-container').orgchart({
                'chartContainer': '#chart-container',
                'data': datascource,
                'nodeContent': 'title',
                'direction': 'b2t'
            });
        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/4.0.1/css/jquery.orgchart.min.css" />
@endpush
