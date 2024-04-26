@props(['name',"value"=> ""])
<x-forms.input-wrapper>
    <x-forms.label :name="$name" />
    <textarea name="{{$name}}" id="{{$name}}" cols="30" rows="10" class="form-control editor">
        {!!old($name,$value)!!}</textarea>
    <x-error :name="$name" />
</x-forms.input-wrapper>


