@extends('layouts.app')

@section('content')
<!-- Submit referral scheme form -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Submit a referral scheme</div>
                <div class="panel-body">
                  <form class="form">
                   <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Title">
                   </div>
                   <div class="form-group">
                    <label>Referral Link/URL</label>
                    <input type="url" class="form-control" id="inputReferralLink" placeholder="Referral link">w
                   </div>
                   <div class="form-group">
                    <label for="comment">Description</label>
                    <textarea class="form-control" rows="5" id="description"></textarea>
                   </div>
                   <div class="form-group">
                    <label>Referer's reward</label>
                    <input type="text" class="form-control" id="refererReward" placeholder="Referer's reward">
                   </div>
                   <div class="form-group">
                    <label>Invitee's reward</label>
                    <input type="text" class="form-control" id="inviteeReward" placeholder="Invitee's reward">
                    </div>
                    <div class="form-group">
                     <label class="btn btn-default" for="my-file-selector">
                        <input id="my-file-selector" type="file" style="display:none;">
                        Choose Image
                     </label>
                     </div>
                  <div class="form-group">
                   <div class="col-md-8">
                     <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                  </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
