class AuthenticationsController < ApplicationController
  before_filter :authenticate_user!, except: :create
  skip_before_filter :verify_authenticity_token

  def index
    @authentications = current_user.authentications
  end

  def create
    auth = request.env['omniauth.auth']

    if user_signed_in?
      if (existing = Authentication.find_by(provider: auth['provider'], uid: auth['uid'])) and existing.user != current_user
        return redirect_to authentications_url, alert: "This account is already connected to a profile."
      end

      authentication = current_user.authentications.find_or_create_by(provider: auth['provider'], uid: auth['uid'])
      authentication.token = auth['credentials']['token']
      authentication.save

      redirect_to authentications_url, success: "Connection successful."
    else
      if existing = Authentication.find_by(provider: auth['provider'], uid: auth['uid'])
        sign_in_and_redirect(:user, existing.user)
      else
        full_name = auth["info"]["name"]

        email = "#{auth["info"]["nickname"]}@on.twitter.com"

        if User.find_by email: email
          return redirect_to new_user_session_path, alert: "A user is already registered with this email address &ndash; try logging in.".html_safe
        end

        new_user = User.new
        new_user.email = email
        new_user.full_name = full_name

        authentication = new_user.authentications.build(provider: auth['provider'], uid: auth['uid'])
        authentication.token = auth['credentials']['token']

        sign_in_and_redirect(:user, new_user)
      end
    end
  end

  def destroy
    @authentication = current_user.authentications.find(params[:id])
    @authentication.destroy
    redirect_to authentications_url, info: "Successfully removed connection."
  end
end
