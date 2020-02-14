<template>
       <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row" v-if="config"> 
                        
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-info mr-50 font-medium-3"></i>
                                       Biodata
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        Change Password
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-bank" data-toggle="pill" href="#account-vertical-bank" aria-expanded="false">
                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                       Bank Information
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-camera mr-50 font-medium-3"></i>
                                        Social links
                                    </a>
                                </li>
                              
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="feather icon-settings mr-50 font-medium-3"></i>
                                       Settings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                       Account
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="alert alert-info text-center">
                            <p>You have to fill your profile in order to begin a trade</p>
                        </div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <!-- <img :src="config.user.passport" class="rounded mr-75" alt="profile image" height="64" width="64"> -->
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                                            <input type="file" id="account-upload" hidden @change="fileChanged">
                                                            <button class="btn btn-sm btn-outline-warning ml-50" @click="uploadPassport">Reset</button>
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                size of
                                                                800kB</small></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <form>
                                                    <div class="row">
                                                        
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Nickname</label>
                                                                    <input type="text" class="form-control" id="account-name" placeholder="Name" v-model="name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">E-mail</label>
                                                                    <input type="email" disabled class="form-control" id="account-e-mail" placeholder="Email" :value="config.user.email" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <p class="mb-0">
                                                                    Your email is not confirmed. Please check your inbox.
                                                                </p>
                                                                <a href="javascript: void(0);">Resend confirmation</a>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                <div v-if="passwordFb" class="alert alert-info alert-dismissable text-center">
                                                    {{passwordFb}}
                                                </div>
                                               <form @submit.prevent="changePassword" @keydown="pwdForm.onKeydown($event)">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-old-password">Old Password</label>
                                                                    <input  type="password" v-model="pwdForm.old" name="old" class="form-control" :class="{ 'is-invalid': pwdForm.errors.has('old') }"  required placeholder="Old Password" >
                                                                          <has-error :form="pwdForm" field="old"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-new-password">New Password</label>
                                                                    <input type="password" v-model="pwdForm.new" name="new" class="form-control" :class="{ 'is-invalid': pwdForm.errors.has('new') }"  required placeholder="new Password" >
                                                                          <has-error :form="pwdForm" field="new"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-retype-new-password">Re-enter New
                                                                        Password</label>
                                                                    <input type="password"  v-model="pwdForm.new_confirmation" name="new_confirmation" class="form-control" :class="{ 'is-invalid': pwdForm.errors.has('new_confirmation') }"  required placeholder="Re-enter new password" >
                                                                          <has-error :form="pwdForm" field="new_confirmation"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" :disabled="pwdForm.busy" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-bank" role="tabpanel" aria-labelledby="account-pill-bank" aria-expanded="false">
                                                <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Account Name</th>
                                                    <th>Account Number</th>
                                                    <th>Bank</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(account, index) in accounts" :key="index">
                                                   
                                                    <td>{{account.account_name}}</td>
                                                    <td>{{account.account_no}}</td>
                                                    <td>{{account.bank_name}}</td>
                                                   
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                                <form @submit.prevent="addAccount" @keydown="form.onKeydown($event)">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div v-if="accountFb" class="alert alert-info alert-dismissible mb-2" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <p class="mb-0">
                                                                  {{ accountFb }}
                                                                </p>
                                                              
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-old-password">Bank Name</label>
                                                                    <input v-model="form.bank" type="text" name="bank"
        class="form-control" :class="{ 'is-invalid': form.errors.has('bank') }">
      <has-error :form="form" field="bank"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-new-password">Account Number</label>
                                                               <input v-model="form.account_number" type="text" name="account_number"
        class="form-control" :class="{ 'is-invalid': form.errors.has('account_number') }">
      <has-error :form="form" field="account_number"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-retype-new-password">Account Name</label>
                                                                 <input v-model="form.account_name" type="text" name="account_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('account_name') }">
      <has-error :form="form" field="account_name"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button :disabled="form.busy" type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add Account</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane active" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                           <form @submit.prevent="addBio" @keydown="form.onKeydown($event)">
                                               <div v-if="bioFb" class="alert alert-info text-center">
                                                   <p>
                                                       {{bioFb}}
                                                   </p>
                                               </div>
                                                    <div class="row">
                                                         <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-phone">First Name</label>
                                                                    <input type="text" v-model="bio.first_name" class="form-control" id="account-phone" required placeholder="First Name"  :class="{ 'is-invalid': form.errors.has('first_name') }">
      <has-error :form="bio" field="first_name"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-phone">Middle Name</label>
                                                                    <input type="text" v-model="bio.middle_name" class="form-control" id="account-phone" required placeholder="Middle Name"  :class="{ 'is-invalid': form.errors.has('middle_name') }">
      <has-error :form="bio" field="middle_name"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-phone">Last name</label>
                                                                    <input type="text" v-model="bio.last_name" class="form-control" id="account-phone" required placeholder="Last Name"  :class="{ 'is-invalid': form.errors.has('last_name') }">
      <has-error :form="bio" field="last_name"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountTextarea">Sex</label>
                                                               <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="sex" value="male" id="male" checked="">
                                                                    <label class="custom-control-label" for="male">Male</label>
                                                             </div>
                                                             <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="sex" value="female" id="female" checked="">
                                                                    <label class="custom-control-label" for="female">Female</label>
                                                             </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-birth-date">Birth date</label>
                                                                    <input type="date" class="form-control birthdate-picker" required placeholder="Date of birth" id="account-birth-date"  v-model="bio.birth" :class="{ 'is-invalid': form.errors.has('birth') }">
                                                                 <has-error :form="bio" field="birth"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountSelect">Country</label>                                                                <select class="form-control" id="accountSelect">
                                                                    <option v-for="(countries, index) in config.country" :key="index">{{countries.name}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="languageselect2">Languages</label>
                                                                <select class="form-control" id="languageselect2" multiple="multiple"   v-model="bio.languages" :class="{ 'is-invalid': form.errors.has('languages') }">
                                                                
                                                                    <option value="English" selected>English</option>
                                                                    <option value="Spanish">Spanish</option>
                                                                    <option value="French">French</option>
                                                                    <option value="Russian">Russian</option>
                                                                    <option value="German">German</option>
                                                                    <option value="Arabic" selected>Arabic</option>
                                                                    <option value="Sanskrit">Sanskrit</option>
                                                                </select>
                                                                 <has-error :form="bio" field="languages"></has-error>
                                                            </div>
                                                        </div>
                                                       
                                                         <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-phone">Phone</label>
                                                                    <input type="text" v-model="bio.phone1" class="form-control" id="account-phone" required placeholder="Phone number"  :class="{ 'is-invalid': form.errors.has('phone1') }">
      <has-error :form="bio" field="phone1"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-phone">Alternate Phone</label>
                                                                    <input v-model="bio.phone2" type="text" class="form-control" id="account-phone" required placeholder="Phone number" :class="{ 'is-invalid': form.errors.has('phone2') }">
      <has-error :form="bio" field="phone2"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-phone">Alternate Phone 2</label>
                                                                    <input type="text" class="form-control" id="account-phone" name="phone3" v-model="bio.phone3" required placeholder="Phone number"  :class="{ 'is-invalid': form.errors.has('phone3') }">
      <has-error :form="bio" field="phone3"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="musicselect2">House Address</label>
                                                               <textarea name="address" class="form-control" id="" cols="30" rows="3" v-model="bio.address" :class="{ 'is-invalid': form.errors.has('address') }">
      <has-error :form="bio" field="address"></has-error></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" :disabled="bio.busy" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-twitter">Twitter</label>
                                                                <input type="text" id="account-twitter" class="form-control" placeholder="Add link" value="https://www.twitter.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-facebook">Facebook</label>
                                                                <input type="text" id="account-facebook" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-google">Google+</label>
                                                                <input type="text" id="account-google" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-linkedin">LinkedIn</label>
                                                                <input type="text" id="account-linkedin" class="form-control" placeholder="Add link" value="https://www.linkedin.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-instagram">Instagram</label>
                                                                <input type="text" id="account-instagram" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-quora">Quora</label>
                                                                <input type="text" id="account-quora" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel" aria-labelledby="account-pill-connections" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <a href="javascript: void(0);" class="btn btn-info">Connect to
                                                            <strong>Twitter</strong></a>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                                        <h6>You are connected to facebook.</h6>
                                                        <span>Johndoe@gmail.com</span>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <a href="javascript: void(0);" class="btn btn-danger">Connect to
                                                            <strong>Google</strong>
                                                        </a>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                                        <h6>You are connected to Instagram.</h6>
                                                        <span>Johndoe@gmail.com</span>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                                <div class="row">
                                                    <h6 class="m-1">Account Settings</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch1">
                                                            <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                            <span class="switch-label w-100">Email me whenever someone opens my trade
                                                                </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch2">
                                                            <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                            <span class="switch-label w-100">Switch on my Trades</span>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->

</template>
<script>
export default {
    props:{
        config:{
            type:Object
        }
    },
    data(){
        return {
            //RESPONSES
            accountFb: false,
            accounts: false,
            passwordFb: false,
            bioFb: false,
            form: new Form({
                bank: '',
                account_name: '',
                account_number: ''
            }),
            bio: new Form({
                first_name: '',
                middle_name: '',
                last_name: '',
                phone1: '',
                phone2: '',
                phone3: '',
                address: '',
                country: '',
                language: '',
                sex: '',
            }),
             pwdForm: new Form({
                old: '',
                new: '',
                new_confirmation: ''
            }),
            passport: 'ui/app-assets/images/portrait/small/avatar-s-26.jpg',
            email: null,
            name: this.config.user.name,
            title: 'Account Settings'

        }
    },
    methods:{
        addAccount(){
            this.form.post('api/add/account').then((response) => {
                this.accountFb = response.data.message;
                this.fetchAccounts();
            }).catch((err) => {
                this.accountFb = "A connection error was encountered"
            })


        },
        changePassword(){
           this.pwdForm.post('api/password/change').then((response) => {
                this.passwordFb = response.data.message;
                
            }).catch((err) => {
                this.passwordFb = "A connection error was encountered"
            })
        },
        fetchAccounts(){
            axios.get('api/accounts').then((response) => {
                this.accounts = response.data;
            })
        },
        fileChanged(e){

        },
        uploadPassport(){

        },
        addBio(){
             this.bio.post('api/add/bio').then((response) => {
                this.bioFb = response.data.message;
                
            }).catch((err) => {
                this.passwordFb = "A connection error was encountered"
            })
        }
        

    },
    mounted(){
        this.fetchAccounts();
      let  meta = {
            title: this.title

        }
        this.$emit('emitMeta', meta);
    }


}
</script>