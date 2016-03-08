<!--
 * Created by PhpStorm
 * User: cole
 * Date: 04/03/16
 * Time: 8:48 PM
 * this is just a form for adding events
 -->
<div class="col s9">
    <div class="card-panel">
        <h3>Create an Event:</h3>
        <form>
            <div class="row">
                <div class="col s6"> {{-- left colunm at top of form--}}
                    <div class="input-field">
                        <input type="text" id="title" name="title" class="validate"/>
                        <label for="title">Title</label>
                    </div>
                    <h5>Sandboxes Involved:</h5>
                    <div class="row">
                        <div class="col s6">
                            <p>
                                <input type="checkbox" id="shiftkeylabs"/>
                                <label for="shiftkeylabs">ShiftKey Labs</label>
                            </p>
                            <p>
                                <input type="checkbox" id="idea"/>
                                <label for="idea">Idea</label>
                            </p>
                            <p>
                                <input type="checkbox" id="cultiv8"/>
                                <label for="cultiv8">Cultiv8</label>
                            </p>
                        </div>
                        <div class="col s6">
                            <p>
                                <input type="checkbox" id="island"/>
                                <label for="island">Island</label>
                            </p>
                            <p>
                                <input type="checkbox" id="launchbox"/>
                                <label for="launchbox">LaunchBox</label>
                            </p>
                            <p>
                                <input type="checkbox" id="sparkzone"/>
                                <label for="sparkzone">Spark Zone</label>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col s6">{{-- Right colunm at top of form--}}
                    <div class="input-field">
                        <input type="text" id="location" name="location" class="validate"/>
                        <label for="location">Location</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" id="start" name="start" class="validate"/>
                            <label for="start">Start Date</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" id="end" name="end" class="validate"/>
                            <label for="end">End Date</label>
                        </div>
                    </div>
                    <div class="input-field">
                        <input type="text" id="link" name="link" class="validate"/>
                        <label for="link">Website (Optional)</label>
                    </div>

                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Image</span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-field">
                        <textarea type="text" id="description" name="description"
                                  class="materialize-textarea"></textarea>
                <label for="description">Description</label>
            </div>

            <div class="row">
                <input type="button" id="submit" class="waves-effect waves-light btn">Submit</input>
            </div>
        </form>
    </div>
</div>
