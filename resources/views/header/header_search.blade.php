<div class="fh5co-hero">
    <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5">
        <div class="desc">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-md-5">
                        <div class="tabulation animate-box">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                <a href="#" aria-controls="Tours" role="tab" data-toggle="tab">{{ trans('messages.find_tour') }}</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="flights">
                                    <div class="row">
                                        <form action="{{ route('search') }}" method="GET">
                                            {{ csrf_field() }}
                                            <div class="col-xs-12">
                                                <div class="input-field">
                                                    <label for="destination">{{ trans('messages.destination') }}:</label>
                                                    <input type="text" class="form-control" id="from-place" name="destination" placeholder="DaNang"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt">
                                                <div class="input-field">
                                                    <label for="category">{{ trans('messages.category') }}:</label>
                                                    <section>
                                                        <select name="category" class="cs-select cs-skin-border">
                                                            <option value="leisure" selected>{{ trans('messages.leisure') }}</option>
                                                            <option value="adventure">{{ trans('messages.adventure') }}</option>
                                                            <option value="diving">{{ trans('messages.diving') }}</option>
                                                        </select>
                                                    </section>
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="date-start">{{ trans('messages.when') }}:</label>
                                                    <input type="text" name="date-start" class="form-control" id="datepicker" placeholder="mm/dd/yyyy"/>
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="duration">{{ trans('messages.duration') }}:</label>
                                                    <input type="text" name="duration" class="form-control" id="from-place" placeholder="Any"/>												</div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="min_price">{{ trans('messages.min_price') }}:</label>
                                                    <input type="text" name="min_price" class="form-control" id="from-place" placeholder="00.0"/>												</div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="max_price">{{ trans('messages.max_price') }}:</label>
                                                    <input type="text" name="max_price" class="form-control" id="from-place" placeholder="00.0"/>												</div>
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="submit" name="search" class="btn btn-primary btn-block" value="{{ trans('messages.search') }}">
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="desc2 animate-box">
                        <div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
                            <p>{{ trans('messages.tour_travel') }}</p>
                            <h2>{{ trans('messages.summer') }}</h2>
                            <h3>{{ trans('messages.promotion') }}</h3>
                            <span class="price">$199</span>
                            <p><a class="btn btn-primary btn-lg" href="#">{{ trans('messages.get_started') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
