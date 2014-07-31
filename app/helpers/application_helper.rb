module ApplicationHelper
  def bootstrap_class_for(flash_type)
    case flash_type
      when "success"
        "alert-success"   # Green
      when "error"
        "alert-danger"    # Red
      when "alert"
        "alert-warning"   # Yellow
      when "notice"
        "alert-info"      # Blue
      else
        flash_type.to_s
    end
  end

  def hero_block(css_class='', target=:hero, options={}, &block)
    css_class += ' after_hero' if target == :after_hero

    content_for target do
      content = with_output_buffer(&block)
      content_tag(:div, content_tag(:div, content, class: "container"), options.merge(class: "hero #{css_class}"))
    end
  end
end
