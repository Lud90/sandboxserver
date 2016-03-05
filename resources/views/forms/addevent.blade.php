<!--
 * Created by PhpStorm.
 * User: cole
 * Date: 04/03/16
 * Time: 8:48 PM
 */
 -->
<div class="row">
    <div class="container">
        <div class="card-panel">
            <h3>Create an Event:</h3>
            <form>
                <div class="input-field">
                    <input type="text" id="title" name="title" class="validate"/>
                    <label for="title">Title</label>
                </div>
                <div class="input-field">
                        <textarea type="text" id="description" name="description"
                                  class="materialize-textarea"></textarea>
                    <label for="description">Description</label>
                </div>
                <h5>Sandboxes Involved:</h5>
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
                <h5>Event Image:</h5>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Image</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>