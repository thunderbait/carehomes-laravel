<a id="filterBtn" href="javascript:void(0)" onclick="openFilter()">Advanced Search</a>
<div class="row">
    <div id="advancedSearch" class="container col-12">
        <h3><a href="javascript:void(0)" class="closebtn" onclick="closeFilter()">&times;</a>Advanced Search</h3>
        <br>
        <form action="{{route('carehomes.index')}}">
            <!-- Input for Location Authority (Dropdown) -->
            <div class="form-group col-md-3">
                <label for="local_authority">Local Authority</label>
                <input id="search1" type="text" class="form-control" placeholder="Search" onkeyup="filterList(this.value, 'select1')">
                <select  id="select1" size="3" type="text" class="form-control" name="local_authority">
                    @foreach ($local_authorities as $local_authority)
                        <option value="{{ $local_authority->id }}">{{ $local_authority->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Input for Group (Dropdown) -->
            <div class="form-group col-md-3">
                <label for="group">Group</label>
                <input id="search2" type="text" class="form-control" placeholder="Search" onkeyup="filterList(this.value, 'select2')">
                <select  id="select2" size="3" type="text" class="form-control" name="group">
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Input for Minimum Number of Beds -->
            <div id="mins" class="form-group col-md-3">
                <label for="number_beds">Min. Number of Beds</label>
                <input type="number" name="number_beds" id="number_beds" class="form-control"
                       placeholder="Enter min. number of beds...">
            </div>
            <!-- Input for Type 1 (Dropdown) -->
            <div class="form-group col-md-3">
                <label for="type1">Type 1</label>
                <input id="search3" type="text" class="form-control" placeholder="Search" onkeyup="filterList(this.value, 'select3')">
                <select  id="select3" size="3" type="text" class="form-control" name="type1">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Input for Type 2 (Dropdown) -->
            <div class="form-group col-md-3">
                <label for="type2">Type 2</label>
                <input id="search4" type="text" class="form-control" placeholder="Search" onkeyup="filterList(this.value, 'select4')">
                <select  id="select4" size="3" type="text" class="form-control" name="type2">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Input for Type 3 (Dropdown) -->
            <div class="form-group col-md-3">
                <label for="type3">Type 3</label>
                <input id="search5" type="text" class="form-control" placeholder="Search" onkeyup="filterList(this.value, 'select5')">
                <select  id="select5" size="3" type="text" class="form-control" name="type3">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Input for Specialism 1 (Dropdown) -->
            <div class="form-group col-md-3">
                <label for="specialism1">Specialism 1</label>
                <input id="search6" type="text" class="form-control" placeholder="Search" onkeyup="filterList(this.value, 'select6')">
                <select  id="select6" size="3" type="text" class="form-control" name="specialism1">
                    @foreach ($specialisms as $specialism)
                        <option value="{{ $specialism->id }}">{{ $specialism->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Input for Specialism 2 (Dropdown) -->
            <div class="form-group col-md-3">
                <label for="specialism2">Specialism 2</label>
                <input id="search7" type="text" class="form-control" placeholder="Search" onkeyup="filterList(this.value, 'select7')">
                <select  id="select7" size="3" type="text" class="form-control" name="specialism2">
                    @foreach ($specialisms as $specialism)
                        <option value="{{ $specialism->id }}">{{ $specialism->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Input for Specialism 3 (Dropdown) -->
            <div class="form-group col-md-3">
                <label for="specialism3">Specialism 3</label>
                <input id="search8" type="text" class="form-control" placeholder="Search" onkeyup="filterList(this.value, 'select8')">
                <select  id="select8" size="3" type="text" class="form-control" name="specialism3">
                    @foreach ($specialisms as $specialism)
                        <option value="{{ $specialism->id }}">{{ $specialism->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <button id="submitBtn" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
