<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>
    <title>Laravel Model Log</title>
</head>
<body>
    <div class="container my-4">
        <div class="card shadow border-0">
            <div class="card-body">
                <h2 class="text-center">Model Logs</h2>
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="border-top-0">
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Model</th>
                            <th>Date Time</th>
                            <th>User Name</th>
                            <th>Activity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->action }}</td>
                                <td>{{ $log->loggable_type }}</td>
                                <td>{{ $log->created_at }}</td>
                                <td>{{ $log->user_id ? $log->user->name : 'NULL' }}</td>
                                <td>
                                    <button type="button"
                                            data-toggle="modal"
                                            title="activity"
                                            data-target="#activityModal{{$log->id}}"
                                            class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="16"
                                             height="16"
                                             fill="currentColor"
                                             class="bi bi-eye"
                                             viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade"
                                 id="activityModal{{$log->id}}"
                                 data-backdrop="static"
                                 data-keyboard="false"
                                 tabindex="-1"
                                 aria-labelledby="staticBackdropLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="staticBackdropLabel">Activity Details</h5>
                                            <button type="button"
                                                    class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <h5>Before Change:</h5>
                                                    @unless(is_bool($log->activity->before_change))
                                                        @foreach(json_decode($log->activity->before_change) as $key=>$value)
                                                            {{ $key }}: {{ $value }}<br>
                                                        @endforeach
                                                    @else
                                                                      No Data Found
                                                    @endunless
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <h5>After Change:</h5>
                                                    @unless(is_bool($log->activity->after_change))
                                                        @foreach(json_decode($log->activity->after_change) as $key=>$value)
                                                            {{ $key }}: {{ $value }}<br>
                                                        @endforeach
                                                    @else
                                                                      No Data Found
                                                    @endunless
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-secondary"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button"
                                                    class="btn btn-primary">Understood
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    <div>{{ $logs->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
