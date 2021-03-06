@extends('employee.includes.layout')
@section('title', 'Social Profile')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row"> 
           <div class="col-lg-12 col-md-12 col-12 section-6-1"> 
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="section-6-2 ">
                            <h2 class="page-title-text1">Social Profile</h2>           
                        <div class="section-6-3">
                          <div class="card">
                              <div class="card-body">
                                <form method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-lg-6 col-md-6 mb-3">
                                          <div class="section-6-4">  
                                            <i class="fab fa-facebook-square" aria-hidden="true"></i>  
                                          </div>
                                          <label class="label-tag2" for="validationDefault01">Facebook Profile</label>
                                          <input type="text" class="form-control field-style2" name="facebook_link" value="{{Auth::user()->facebook_link}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                          <div class="section-6-5">  
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                          </div>  
                                          <label  class="label-tag2" for="validationDefault01">Instagram Profile</label>
                                          <input type="text" class="form-control field-style2" name="instagram_link" value="{{Auth::user()->instagram_link}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                          <div class="section-6-6">  
                                            <i class="fab fa-linkedin" aria-hidden="true"></i>
                                          </div>  
                                          <label  class="label-tag2" for="validationDefault01">Linkedin Profile</label>
                                          <input type="text" class="form-control field-style2" name="linkedin_link" value="{{Auth::user()->linkedin_link}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                          <div class="section-6-7">  
                                           <i class="fab fa-skype" aria-hidden="true"></i> 
                                          </div>  
                                          <label  class="label-tag2" for="validationDefault01">Skype Profile</label>
                                          <input type="text" class="form-control field-style2" name="skype_link" value="{{Auth::user()->skype_link}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                          <div class="section-6-8">  
                                            <i class="fab fa-whatsapp" aria-hidden="true"></i> 
                                          </div>  
                                          <label  class="label-tag2" for="validationDefault01">Whatsapp Profile</label>
                                          <input type="text" class="form-control field-style2" name="whatsapp_no" value="{{Auth::user()->whatsapp_no}}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                          <div class="section-6-9">  
                                            <i class="fab fa-twitter" aria-hidden="true"></i> 
                                          </div>  
                                          <label  class="label-tag2" for="validationDefault01">Twitter Profile</label>
                                          <input type="text" class="form-control field-style2" name="twitter_link" value="{{Auth::user()->twitter_link}}">
                                        </div>
                                         <button class="btn-2 custom-btn6" type="submit">Save</button>        
                                    </div>                                                                    
                                </form>
                              </div>
                           </div>
                        </div> 
                    </div>
                  </div> 
                </div>
           </div>  
        </div>   
    </div>
</div>

@endsection
@section('addScript')
<script type="text/javascript">
</script>
@endsection