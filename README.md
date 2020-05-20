## GridFieldRelationHandler

This module provides two [`GridField`](http://doc.silverstripe.org/framework/en/topics/grid-field) components
that aid in managing relationships within [SilverStripe](http://www.silverstripe.org). The
[`GridFieldHasOneRelationHandler`](#gridfieldhasonerelationhandler) component allows a `SS_List` to be used to select the value of a has_one
relation and the [`GridFieldManyRelationHandler`](#gridfieldmanyrelationhandler) component manages a `RelationList`.

## Installation (with composer)

    $ composer require silverstripe/gridfield-relation-handler:^2.0

## GridFieldHasOneRelationHandler

![](https://files.app.net/zb9sU5vs.png)

The `GridFieldHasOneRelationHandler` component provides radio buttons for selecting the object that the
has_one points to. Its constructor takes the object the relation exists on, the name of the relation and
an optional target fragment which describes the position of the save relation button.

### Example

	:::php
	$config->addComponent(new GridFieldHasOneRelationHandler($this, 'MainImage'));

## GridFieldManyRelationHandler

![](https://files.app.net/zb9r7VqE.png)

The `GridFieldManyRelationHandler` component provides check boxes for selecting the objects that a
has_many or many_many point to. Its constructor takes an optional target fragment which describes
the position of the save relation button.

If your `GridField` also has a `GridFieldPaginator` component, this component must be inserted before
it for the pagination to work properly.

### Example

	:::php
	// The second argument here ensures that this component is placed before any GridFieldPaginator
	$config->addComponent(new GridFieldManyRelationHandler(), GridFieldPaginator::class);

## License

	Copyright (c) 2014, Simon Welsh - simon.geek.nz
	All rights reserved.

	Redistribution and use in source and binary forms, with or without
	modification, are permitted provided that the following conditions are met:
	    * Redistributions of source code must retain the above copyright
	      notice, this list of conditions and the following disclaimer.
	    * Redistributions in binary form must reproduce the above copyright
	      notice, this list of conditions and the following disclaimer in the
	      documentation and/or other materials provided with the distribution.
	    * The name of Simon Welsh may not be used to endorse or promote products
	      derived from this software without specific prior written permission.

	THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
	ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
	WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
	DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
	DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
	(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
	LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
	ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
	(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
	SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
