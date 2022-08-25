<div class="modal fade" id="modal-detail-{{$talent->talent_id}}">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 1140px !important;">
      <div class="modal-content">
          <div class="modal-header mx-auto">
              <div class="modal-title font-weight-bold">Detail Talent {{$result}}</div>
          </div>
          <div class="modal-body" style="min-height: 30rem;">
            <div class="row">
                <div class="col-sm-4 mx-2 position-fixed">      
                  <img class="mb-3 d-block mx-auto" src="{{url('/img/avatar/noimage.jpg')}}" style="width: 200px; height:200px;" alt="avatar">
                  <table class="table table-stripped">
                    <tr>
                      <td>Gaji Sekarang</td>
                      {{-- <td>Rp {{number_format($talent->gaji)}}</td> --}}
                      <td>:</td>
                      <td>
                        {{ $talent->gaji }}
                      </td>
                    </tr>
                    <tr>
                      <td>Expetasi</td>
                      {{-- <td>Rp {{number_format($talent->expetasi)}}</td> --}}
                      <td>:</td>
                      <td>
                        {{ $talent->expetasi }}
                      </td>
                    </tr>
                    <tr>
                      <td>Domisili</td>
                      <td>:</td>
                      <td>{{$talent->talent_address}}</td>
                    </tr>
                    <tr>
                      <td>Ready Luar Kota</td>
                      <td>:</td>
                      <td>{{$talent->talent_luar_kota}}</td>
                    </tr>
                  </table>
                </div>
              <div class="col-sm-7 offset-4">
                <div class="education">
                  <h4>Education</h4>
                  <div class="row ml-1">
                    @foreach($talent->talent_education()->get() as $row )
                      <div class="col-md-12 col-sm-12 col-xs-12 row mb-2">
                        <div class="date col-md-3 col-sm-3 col-xs-4 border-right p-0">
                          <p class="m-0">
                            {{$row->edu_datestart}}
                          </p>
                          <p class="m-0">{{$row->edu_dateend}}</p>
                        </div>
                        <div class="from col-md-9 col-sm-9 col-xs-8">
                          <p class="font-weight-bold pt-1">{{$row->edu_name}}</p>
                        </div>
                      </div>
                    @endforeach	
                  </div>
                </div>
                <div class="experience my-2">
                  <h4>Experience</h4>
                  <div class="row ml-1">
                    @foreach($talent->talent_workex()->get() as $row )
                      <div class="col-md-12 col-sm-12 col-xs-12 row mb-2">
                        <div class="date col-md-3 col-sm-3 col-xs-4 border-right p-0">
                          <p class="m-0">{{$row->workex_startdate}}</p>
                          <p class="m-0">{{$row->workex_enddate}}</p>
                        </div>
                        <div class="from col-md-3 col-sm-3 col-xs-8">
                          <p class="font-weight-bold pt-1">{{$row->workex_position}} - {{ $row->workex_office }}</p>
                        </div>
                      </div>
                    @endforeach	
                  </div>
                </div>
                <div class="skills my-2">
                  <h4>Skills</h4>
                  @foreach ( $talent->talent_skill()->get() as $row )
                    <?php 
                
                      if ( $row->st_skill_verified == "YES")
                      {
                        $badge = 'success'; 
                      }
                      else
                      {
                        $badge = 'light'; 
                      }
                      $skill = $row->skill()->first(); 
                    
                    ?>
                    <div class="badge badge-light">
                      {{$skill->skill_name}}
                    </div> 
                  @endforeach
                </div>
                <div class="portofolio my-2">
                  <h4>Portofolio</h4>
                  <div class="item-outer row clearfix">
                    @foreach($talent->talent_portfolio()->get() as $row )
                      <div class="col-md-4 col-sm-6 col-xs-6 filtr-item" data-sort="value">
                        <a href="{{$row->portofolio_link}}" class="link">{{$row->portofolio_link}}</a>    
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <div class="nav nav-pills pull-right">
                  <button type="close" class="btn btn-secondary rounded" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
</div>