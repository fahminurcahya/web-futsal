<x-admin.layout>
    <section class="content">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-solid">
                    <div class="card-header">
                        <a href="{{ route('admin.field.create') }}" class="btn btn-primary">Add Field</a>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row">
                            @forelse ($fields as $field)
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b>{{ $field->name }}</b></h2>
                                                    <ul class="ml-4 mt-4 mb-0 fa-ul text-muted">
                                                        <li class="small mt-2">
                                                            <span class="fa-li"><i class="fas fa-lg fa-money-bill"></i></span>
                                                            Rp.{{ number_format($field->price_per_hour) }}
                                                            / jam
                                                        </li>
                                                    </ul>
                                                    <p class="text-muted text-sm mt-4"><b>Desc: </b> {{ $field->desc }}</p>
                                                </div>
                                                <div class="col-5 text-center">
                                                    @if(!empty($field->image))
                                                    <img src="{{ url(Storage::url($field->image)) }}" alt="image" class="img-fluid" style="width: 100%">
                                                    @else
                                                    <p>No Image Available</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="{{ route('admin.field.edit', $field->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> Edit Fields
                                                </a>
                                                <form action="{{ route('admin.field.destroy', $field->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lapangan ini?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-sm-12 text-center mb-4">
                                    <span >No data available</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <section class="content">
                    <div class="card card-solid">
                        <div class="card-header">
                            Jadwal futsal
                        </div>
                        <div class="card-body pb-0">
                            <div class="row">
                                @forelse ($timeslots as $timeslot)
                                <div class="form-group ">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                      <input type="checkbox" class="custom-control-input" id="customSwitch-{{$timeslot->id}}" onchange="updateData({{$timeslot->id}})" {{$timeslot->is_active ? 'checked' : ''}} >
                                      <label class="custom-control-label" for="customSwitch-{{$timeslot->id}}">{{ date('H:i', strtotime($timeslot->start_time)) }} - {{ date('H:i', strtotime($timeslot->end_time)) }}</label>
                                    </div>
                                @empty
                                <div class="col-sm-12 text-center mb-4">
                                    <span >No data available</span>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    </section>

    <script>
        function updateData(id) {
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url: `/admin/timeslot/${id}`,
            success:function(response){
                if (response.success) {
                    toastr.success(response.message)
                checkbox.checked = response.is_active;
            } else {
                toastr.success('Error updating timeslot: ' + response.message)
                checkbox.checked = !checkbox.checked;
            }
            },
            error:function(err){
                console.log(err);
            }
        })
        }
</script>
</x-admin.layout>
